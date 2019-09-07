#matplotlib inline

import numpy as np
import matplotlib.pyplot as plt
import math
import cv2                    # OpenCV library for computer vision
from PIL import Image
import time
import boto3
import tempfile
import sys
from utils import *

from keras.models import load_model

model = load_model('my_model.h5')

client = boto3.client('s3', region_name='ap-south-1')
client.download_file('be-project', 'sample', 'test.jpg')

image = cv2.imread('test.jpg')
denoised_image = cv2.fastNlMeansDenoisingColored(image,None,30,20,6,7)
cv2.imwrite('denoised.jpg', denoised_image)
client.upload_file('denoised.jpg', 'be-project', 'denoised.jpg')
gray = cv2.cvtColor(denoised_image, cv2.COLOR_RGB2GRAY)

face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')

faces = face_cascade.detectMultiScale(denoised_image, 2, 3)

if len(faces) == 0:
    print(0)
elif len(faces) > 1:
    print(0)
image_with_detections = np.copy(denoised_image)
size = 60
kernel = np.ones((size, size),np.float32)/(size*size)
if len(faces) == 1:
    for (x,y,u,v) in faces:
        # Add a red bounding box to the detections image
        cv2.rectangle(image, (x,y), (x+u,y+v), (255,0,0), 3)
        resized = cv2.resize(gray[y:y+v, x:x+u] ,(96,96))
        resized_color = cv2.resize(image[y:y+v, x:x+u], (96,96))
        X = np.vstack(resized) / 255. 
        X = X.astype(np.float32)
        X = X.reshape(-1, 96, 96, 1) 
        keypoints = model.predict(X)[0]
        keypoints = keypoints * 48 + 48 
        keyx = keypoints[0::2]
        if keyx.size == 15:
            print(11)
        else:
            print(0)
        keyy = keypoints[1::2]
        for kx, ky in zip(keyx, keyy):
            cv2.circle(resized_color, (kx,ky), 1, (0,255,0), 1)
        image[y:y+v, x:x+u] = cv2.resize(resized_color, (v,u))

fig = plt.figure(figsize = (8,8))
ax1 = fig.add_subplot(111)
ax1.set_xticks([])
ax1.set_yticks([])
cv2.imwrite('keypoints.jpg', image)
client.upload_file('keypoints.jpg', 'be-project', 'keypoints.jpg')
ax1.set_title('Faces')
ax1.imshow(image)
