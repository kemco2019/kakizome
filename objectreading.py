import cv2
import os
import time

cap = cv2.VideoCapture(0)
cap.set(cv2.CAP_PROP_FOURCC, cv2.VideoWriter_fourcc('M', 'J', 'P', 'G'))
cap.set(cv2.CAP_PROP_FPS, 30)   
cap.set(cv2.CAP_PROP_FRAME_WIDTH, 1280)
cap.set(cv2.CAP_PROP_FRAME_HEIGHT, 960)
cap.set(cv2.CAP_PROP_AUTOFOCUS, 1)
#cap.set(cv2.CAP_PROP_FOCUS, 0.8)

n=0;

if cap.isOpened() is False:
    print("IO Error")
else:
     while True:
        ret, frame = cap.read()
        cv2.imshow('frame',frame)
        key=cv2.waitKey(33)
        
        if key == 27:
            cv2.imwrite("2024.png", frame)
            print("Save to 2023.png")
        elif key == ord('q'):
            break
            #time.sleep(5)
#        print(cap.get(cv2.CAP_PROP_FOCUS))
#        print(cap.get(cv2.CAP_PROP_EXPOSURE))
 #       cv2.destroyWindow('frame')
