import paddleocr
from paddleocr import PaddleOCR, draw_ocr # main OCR dependencies
import mysql.connector
import sys

# Get arguments from command line
if len(sys.argv) != 3:
    print("Usage: python script.py patientId imageFile")
    sys.exit(1)

patientId = sys.argv[1]
imageFile = sys.argv[2]

mydb = mysql.connector.connect( 
    host="localhost",
    user="root",
    password="",
    database="doctor"
)

mycursor = mydb.cursor()


print(imageFile)

ocr_model = PaddleOCR(lang='en')
img_path = 'C:\\xampp\\htdocs\\final\\img\\' + imageFile


# Perform OCR on the image
result = ocr_model.ocr(img_path)


result_str=' '.join([word_info[1][0] for line in result for word_info in line])
print(result_str)


# Assuming mysql_update is a string with placeholders for updating a specific column
mysql_update = "UPDATE patient SET prescription = %s WHERE patient_id = %s"

# Then execute the update query with parameters
mycursor.execute(mysql_update, (result_str, patientId))


mydb.commit()

mydb.close()
