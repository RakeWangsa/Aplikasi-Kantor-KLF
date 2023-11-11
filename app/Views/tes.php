<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            height: 80px;
        }

        .today {
            background-color: #7fd3f3; /* Ganti dengan warna yang diinginkan */
        }

        #calendar-info {
            margin-bottom: 20px;
        }
    </style>
    <title>Calendar</title>
</head>
<body>

    <h2>Calendar</h2>

    <div id="calendar-info">
        <!-- Tempat untuk informasi tanggal, bulan, dan tahun -->
    </div>

    <table>
        <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </thead>
        <tbody id="calendar-body">
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarBody = document.getElementById('calendar-body');
            const calendarInfo = document.getElementById('calendar-info');

            function generateCalendar() {
                calendarBody.innerHTML = '';

                const currentDate = new Date();
                const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                const lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

                let date = new Date(firstDayOfMonth);
                let row = calendarBody.insertRow();

                // Mulai dengan menambahkan sel kosong untuk hari sebelum tanggal pertama bulan
                for (let i = 0; i < date.getDay(); i++) {
                    row.insertCell();
                }

                while (date <= lastDayOfMonth) {
                    const cell = row.insertCell();
                    const day = date.getDate();

                    // Tambahkan informasi ke sel kalender
                    cell.innerHTML = day;

                    // Tambahkan kelas CSS 'today' jika hari ini
                    if (isToday(date)) {
                        cell.classList.add('today');
                    }

                    date.setDate(day + 1);

                    if (date.getDay() === 0) {
                        row = calendarBody.insertRow();
                    }
                }

                // Tambahkan informasi tanggal, bulan, dan tahun di bagian atas
                const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                const currentMonth = monthNames[currentDate.getMonth()];
                const currentYear = currentDate.getFullYear();

                calendarInfo.innerHTML = `<h3>${currentMonth} ${currentYear}</h3>`;
            }

            function isToday(date) {
                const today = new Date();
                return (
                    date.getDate() === today.getDate() &&
                    date.getMonth() === today.getMonth() &&
                    date.getFullYear() === today.getFullYear()
                );
            }

            generateCalendar();
        });
    </script>

</body>
</html>
