# 🚗 ระบบจองรถยนต์ คณะศึกษาศาสตร์ มหาวิทยาลัยบูรพา

ระบบจัดการการจองและใช้งานรถยนต์สำหรับหน่วยงาน พัฒนาด้วย PHP, MySQL และ JavaScript

![Car Reservation System](https://img.shields.io/badge/PHP-7.4%2B-blue)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-3.x-purple)
![License](https://img.shields.io/badge/License-MIT-green)

## 📋 คุณสมบัติหลัก

### 🔐 ระบบการจัดการผู้ใช้
- เข้าสู่ระบบด้วย Username/Password
- การจัดการ Session
- ระบบ Logout ที่ปลอดภัย

### 📅 ระบบจองรถ
- **ปฏิทินแบบ Interactive** - แสดงการจองในรูปแบบปฏิทิน
- **ฟอร์มจองรถ** - กรอกข้อมูลการจอง (ชื่อ, วัตถุประสงค์, สถานที่, วันที่)
- **การเลือกรถและคนขับ** - เลือกประเภทรถและพนักงานขับรถ
- **การแก้ไขและลบข้อมูล** - จัดการข้อมูลการจองที่มีอยู่

### 📊 ระบบรายงานและสถิติ
- **สถิติการใช้รถยนต์** - กราฟแสดงการใช้รถแต่ละประเภท
- **สถิติพนักงานขับรถ** - กราฟแสดงสถิติการทำงานของคนขับ
- **การแสดงผลแบบตาราง** - รายการข้อมูลทั้งหมด

### 🎨 ส่วนติดต่อผู้ใช้
- **Responsive Design** - ใช้งานได้ทุกอุปกรณ์
- **Bootstrap UI** - ส่วนติดต่อที่สวยงาม
- **FullCalendar Integration** - ปฏิทินแบบ Interactive

## 🛠 เทคโนโลยีที่ใช้

### Backend
- **PHP** 7.4+ - ภาษาหลักในการพัฒนา
- **MySQL** 5.7+ - ฐานข้อมูล
- **Custom MySQL Class** - การเชื่อมต่อฐานข้อมูล

### Frontend
- **HTML5/CSS3** - โครงสร้างหน้าเว็บ
- **Bootstrap 3** - CSS Framework
- **jQuery** - JavaScript Library
- **FullCalendar** - ปฏิทินแบบ Interactive
- **Morris.js** - การแสดงกราฟ
- **Font Awesome** - ไอคอน

### Libraries & Tools
- **Moment.js** - จัดการวันที่และเวลา
- **Bootstrap DateTimePicker** - เลือกวันที่
- **FancyBox** - Modal และ Popup
- **DataTables** - ตารางข้อมูลแบบ Interactive

## 📁 โครงสร้างไฟล์

```
educarservice/
├── pages/
│   ├── main.php                 # หน้าหลัก
│   ├── chkuser.php             # ตรวจสอบการเข้าสู่ระบบ
│   ├── chk_session.php         # ตรวจสอบ Session
│   ├── cars-form.php           # ฟอร์มเพิ่มข้อมูล
│   ├── cars-insert.php         # ประมวลผลการเพิ่มข้อมูล
│   ├── data.php                # สถิติการใช้รถ
│   ├── data2.php               # สถิติพนักงานขับรถ
│   ├── home.php                # หน้าปฏิทิน
│   ├── main-table.php          # แสดงข้อมูลแบบตาราง
│   └── ...
├── config/
│   ├── mysql.php               # คลาสเชื่อมต่อฐานข้อมูล
│   ├── connect.php             # การตั้งค่าฐานข้อมูล
│   └── thai_date.php           # ฟังก์ชันจัดการวันที่ไทย
├── bower_components/           # Frontend Libraries
├── dist/                       # CSS และ JS ที่ compile แล้ว
└── README.md
```

## ⚙️ การติดตั้ง

### 1. ความต้องการของระบบ
- **Web Server**: Apache 2.4+ หรือ Nginx
- **PHP**: 7.4 หรือสูงกว่า
- **MySQL**: 5.7 หรือสูงกว่า
- **phpMyAdmin** (แนะนำสำหรับจัดการฐานข้อมูล)

### 2. การติดตั้งด้วย XAMPP

```bash
# 1. ดาวน์โหลดและติดตั้ง XAMPP
# 2. วางโฟลเดอร์โปรเจค
cp -r educarservice/ C:/xampp/htdocs/

# 3. เริ่ม Apache และ MySQL
```

### 3. การตั้งค่าฐานข้อมูล

```sql
-- สร้างฐานข้อมูล
CREATE DATABASE cars;

-- สร้างตาราง adminpr (ผู้ดูแลระบบ)
CREATE TABLE adminpr (
    idadmin INT AUTO_INCREMENT PRIMARY KEY,
    uadmin VARCHAR(50) NOT NULL,
    padmin VARCHAR(255) NOT NULL,
    uname VARCHAR(100) NOT NULL,
    status TINYINT DEFAULT 1
);

-- สร้างตาราง car (ข้อมูลการจองรถ)
CREATE TABLE car (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    object VARCHAR(255) NOT NULL,
    locate VARCHAR(100) NOT NULL,
    timego VARCHAR(50) NOT NULL,
    timeback VARCHAR(50) NOT NULL,
    typecar VARCHAR(50) NOT NULL,
    driver VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- เพิ่มข้อมูลผู้ดูแลระบบ
INSERT INTO adminpr (uadmin, padmin, uname, status) VALUES 
('admin', 'admin', 'ผู้ดูแลระบบ', 1),
('user1', 'user1', 'ทดสอบ', 1);
```

### 4. การตั้งค่าการเชื่อมต่อฐานข้อมูล

แก้ไขไฟล์ `config/connect.php`:

```php
<?php
$host = "localhost";
$user = "root";
$pw = "";
$dbname = "cars";
?>
```

## 🚀 การใช้งาน

### 1. เข้าสู่ระบบ
```
URL: http://localhost/educarservice/pages/
Username: admin
Password: admin
```

### 2. ฟีเจอร์หลัก

#### 📅 ดูปฏิทิน
- เข้าเมนู "ข้อมูลแบบปฏิทิน"
- ดูการจองรถในรูปแบบปฏิทิน
- คลิกที่เหตุการณ์เพื่อดูรายละเอียด

#### ➕ เพิ่มข้อมูลการจอง
- เข้าเมนู "เพิ่มข้อมูล"
- กรอกข้อมูล: ชื่อผู้จอง, วัตถุประสงค์, สถานที่, วันที่
- เลือกประเภทรถและคนขับ
- กดบันทึก

#### 📊 ดูสถิติ
- **สถิติการใช้รถ**: แสดงการใช้รถแต่ละประเภท
- **สถิติคนขับ**: แสดงสถิติการทำงานของพนักงาน

## 🔧 การกำหนดค่า

### รายการรถที่มีในระบบ
```php
// ในไฟล์ data.php
$cars = array(
    '40-0770' => 'a',
    'นค7118' => 'b', 
    'นง625' => 'c',
    'ผบ8461' => 'd',
    'รถเช่า' => 'e'
);
```

### รายการพนักงานขับรถ
```php
// ในไฟล์ data2.php
$drivers = array(
    'ภิญโญ' => 'a',
    'มนต์ชัย' => 'b', 
    'สายชล' => 'c',
    'วิสุทธิ์' => 'd'
);
```

## 📱 การใช้งานบนมือถือ

ระบบรองรับการใช้งานบนอุปกรณ์มือถือด้วย Responsive Design:
- ✅ ดูปฏิทินได้สะดวก
- ✅ กรอกข้อมูลได้ง่าย
- ✅ ดูสถิติได้ชัดเจน

## 🛡️ ความปลอดภัย

- **Session Management** - จัดการ Session อย่างปลอดภัย
- **SQL Injection Protection** - ใช้ Prepared Statements
- **Access Control** - ตรวจสอบสิทธิ์การเข้าถึง
- **Data Validation** - ตรวจสอบข้อมูลก่อนบันทึก

## 🔍 การแก้ไขปัญหา

### ปัญหาที่พบบ่อย

#### 1. ไม่สามารถเข้าสู่ระบบได้
```
- ตรวจสอบ Username/Password
- ตรวจสอบการเชื่อมต่อฐานข้อมูล
- ตรวจสอบตาราง adminpr
```

#### 2. ปฏิทินไม่แสดง
```
- ตรวจสอบไฟล์ JavaScript ถูกโหลดครบถ้วน
- ตรวจสอบข้อมูลในตาราง car
- เปิด Developer Tools ดู Console errors
```

#### 3. กราฟไม่แสดง
```
- ตรวจสอบ Morris.js library
- ตรวจสอบข้อมูลในฐานข้อมูล
- ตรวจสอบ Console errors
```

## 📈 การพัฒนาต่อ

### คุณสมบัติที่สามารถเพิ่มได้
- 🔔 **ระบบแจ้งเตือน** - แจ้งเตือนการจองล่วงหน้า
- 📧 **ส่งอีเมล** - แจ้งการจองทางอีเมล
- 🔄 **การอนุมัติ** - ระบบอนุมัติการจอง
- 📱 **Mobile App** - แอปพลิเคชันบนมือถือ
- 🗓️ **การจองซ้ำ** - จองรถแบบรายวัน/รายสัปดาห์
- 📊 **รายงานขั้นสูง** - รายงานการใช้รถรายเดือน/ปี

## 🤝 การสนับสนุน

หากพบปัญหาการใช้งานหรือต้องการพัฒนาเพิ่มเติม:

- 📧 **อีเมล**: [mercedesbenz3010@gmail.com]
- 🐛 **รายงานข้อผิดพลาด**: สร้าง Issue ใน Repository
- 💡 **ข้อเสนอแนะ**: ยินดีรับฟังความคิดเห็น

## 📄 ใบอนุญาต

โครงการนี้ใช้สิทธิ์แบบ MIT License - ดูรายละเอียดในไฟล์ [LICENSE](LICENSE)

---

> 💻 **พัฒนาโดย**: นายจักรพงษ์ แผ่นทอง  
> 📅 **ปรับปรุงล่าสุด**: สิงหาคม 2025  
> 🌟 **เวอร์ชัน**: 1.0.0

---

## 🎯 Quick Start

```bash
# 1. Clone โปรเจค
git clone [repository-url]

# 2. ตั้งค่าฐานข้อมูล
mysql -u root -p < database.sql

# 3. ตั้งค่า config
cp config/connect.example.php config/connect.php

# 4. เริ่มใช้งาน
http://localhost/educarservice/pages/
```

**Happy Coding! 🚗✨**
