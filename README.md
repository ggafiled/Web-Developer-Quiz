# Web-Developer-Quiz
แบบทดสอบก่อนเข้าสมัครงาน ตำแหน่ง Web Developer (PHP)

### ข้อที่ 1 รับค่าจาก input เป็นชุดตัวเลข 1 ชุด โดยใช้ คอมม่า(,) คั่นระหว่างตัวเลขแต่ละตัว และเก็บชุดตัวเลขทั้งหมดลงใน database นำข้อมูลตัวเลขทั้งหมดใน database มาคำนวณและแสดงผลโดยมีเงื่อนไขดังนี้
1. ถ้าข้อมูลตัวใดหารด้วย 3 ลงตัว ให้บวกด้วย 5
2. ให้แสดงผลข้อมูลจากการคำนวณในข้อ 1 โดยเรียงลำดับจากมากไปหาน้อย

<i> ตอบ </i> 
> Demo [https://powerful-wildwood-70333.herokuapp.com/]
> Sorce code [ด้านบน]
##### แทนข้อมูลใน Array เป็น database
``` PHP
<?php
$database = array();                                                      // แทนฐานข้อมูล
$input = "5, 9, 18, 7, 29, 14, 39, 20";                                   // ข้อมูลนำเข้า
$database = explode(",",$input);                                          // แยกข้อมูลแต่ละตัวที่คั่นด้วย , ลงเก็บในฐานข้อมูล
foreach($database as $key=>$item){                                        // วนลูปเพื่อเข้าถึงข้อมูลแต่ละตัว
  if($item % 3 === 0 ){                                                   // เช็คว่าหาร 3 ลงตัวไหม
   $database[$key] += 5;                                                  // +5 ถ้าหาร 3 ลงตัว
  }
}
rsort($database);                                                         // เรียงข้อมูลจากมากไปน้อย
echo "ข้อมูลจากการคำนวณ: ".print_r(implode(",",$database),true);           // แสดงผลลัพธ์
?>
```

##### ตัวอย่างผลลัพธ์
> ข้อมูลจากการคำนวณ: 44, 29,23, 20,14, 14, 7,5

##### ภาพหน้าจอ
![UI](https://github.com/ggafiled/Web-Developer-Quiz/blob/master/Capture.PNG?raw=true)

![UI](https://github.com/ggafiled/Web-Developer-Quiz/blob/master/Capture3.PNG?raw=true)
