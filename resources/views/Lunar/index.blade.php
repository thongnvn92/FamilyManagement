@extends('layouts.app')

@section('content')
<style>
    body {
      background: url('https://source.unsplash.com/1600x900/?nature,autumn') no-repeat center center;
      background-size: cover;
      font-family: 'Nunito', sans-serif;
    }

    .calendar-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 20px;
    }

    .header-calendar {
      background-color: #2c3e50;
      color: white;
      padding: 10px;
      border-radius: 2px 2px 0 0;
      text-align: center;
      font-weight: bold;
    }

    .selected-date {
      font-size: 5rem;
      font-weight: 600;
      color: #2c3e50;
      line-height: 5rem;
    }

    .calendar td {
      height: 60px;
      text-align: center;
      cursor: pointer;
      padding: 15px;
      transition: 0.3s;
      position: relative;
    }

    .calendar .selected {
      background-color: #27ae60;
      color: white;
    }

    .calendar td:hover {
      background-color: #bacad6;
      color: white;
      opacity: 0.8;
    }

    .calendar th {
      width: fit-content;
      height: 50px;
      background-color: #2c3e50;
      color: white;
      padding: 7px;
    }

    .info-container {
      text-align: center;
      margin-top: 20px;
      font-size: 1rem;
      color: #2c3e50;
    }

    .day-duong {
      font-size: 1.2rem;
      font-weight: bold;
      position: absolute;
      top: 5px;
      left: 5px;
    }

    .day-am {
      font-size: 0.8rem;
      position: absolute;
      bottom: 5px;
      right: 5px;
      color: #555;
    }

    .btn-nav {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      border: none;
      background-color: transparent;
      color: #a8a8a8;
      font-size: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background-color 0.3s, transform 0.2s;
      opacity: 0.5;
    }

    .btn-nav:hover {
      background-color: #f2f2f2;
      transform: scale(1.0);
      opacity: 0.5;
    }

    hr {
        border: 0;
        height: 1px;
        background: #333;
        background: -webkit-linear-gradient(left, hsla(0,0%,0%,0) 0%, hsla(0,0%,0%,.75) 50%, hsla(0,0%,0%,0) 100%);
        background:    -moz-linear-gradient(left, hsla(0,0%,0%,0) 0%, hsla(0,0%,0%,.75) 50%, hsla(0,0%,0%,0) 100%);
        background:     -ms-linear-gradient(left, hsla(0,0%,0%,0) 0%, hsla(0,0%,0%,.75) 50%, hsla(0,0%,0%,0) 100%);
        background:      -o-linear-gradient(left, hsla(0,0%,0%,0) 0%, hsla(0,0%,0%,.75) 50%, hsla(0,0%,0%,0) 100%);
    }
  </style>

<div class="row justify-content-center">
    <div class="col-md-6 calendar-container text-center">
      <div class="border">
        <div class="header-calendar d-flex justify-content-between fs-5">
          <div>THÁNG 02</div>
          <div>2025</div>
          <div>THỨ BA</div>
        </div>
        <div class="p-2 d-flex justify-content-between">
          <div>
            <button type="button" class="btn btn-outline-success"><i class="fa fa-sun-o"></i> Hôm nay</button>
          </div>

          <div class="d-grid">
            <span class="fs-6">Tuần 07</span>
            <span class="fs-6">Ngày 41</span>
          </div>
        </div>
        <div class="selected-date p-2 d-flex justify-content-center align-items-center" >
          <button type="button" class="btn-nav">
            <i class="fa fa-chevron-left"></i>
          </button>
          <div id="selectedDate">11</div>
          <button type="button" class="btn-nav">
            <i class="fa fa-chevron-right"></i>
          </button>
        </div>
        <div class="border-primary border-start p-2 mx-auto w-75">
          <p class="text-left fst-italic" style="font-size: 0.8rem;">
            Các module cấp cao không nên phụ thuộc vào các module cấp thấp. Cả hai nên phụ thuộc vào abstraction.
          </p>
          <p class="m-0 text-end" style="font-size: 0.6rem;">Nguyên tắc SOLID</p>
        </div>
        <p class="text-center" style="font-size: 0.9rem;">Tiết <span class="text-primary">Lập Xuân</span> | Bắt đầu vào 03-02</p>
        <hr>
        <div class="info-container p-2 d-flex justify-content-between align-items-start">
          <div class="d-grid fs-6">
            <span>Ngày Tân Hợi</span>
            <span>Tháng Mậu Dần</span>
            <span>Năm Ất Tỵ</span>
          </div>
          <div class="d-grid">
            <span>Tháng 01</span>
            <span class="fs-1">14</span>
            <span>Năm 2025</span>
          </div>
          <div class="d-grid fs-6">
            <span>Giờ Mậu Tý</span>
            <span>Tuần Giáp Thìn</span>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 calendar-container text-center">
      <table class="table table-bordered calendar">
        <thead>
          <tr>
            <th>THỨ HAI</th>
            <th>THỨ BA</th>
            <th>THỨ TƯ</th>
            <th>THỨ NĂM</th>
            <th>THỨ SÁU</th>
            <th>THỨ BẢY</th>
            <th>CHỦ NHẬT</th>
          </tr>
        </thead>
        <tbody id="calendarBody">
          <!-- Ngày sẽ được thêm động vào đây -->
        </tbody>
      </table>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      let days = [['', '', '', '', '', 1, 2], [3, 4, 5, 6, 7, 8, 9], [10, 11, 12, 13, 14, 15, 16], [17, 18, 19, 20, 21, 22, 23], [24, 25, 26, 27, 28, 1, 2]];
      let amDays = [['', '', '', '', '', 21, 22], [23, 24, 25, 26, 27, 28, 29], [30, 1, 2, 3, 4, 5, 6], [7, 8, 9, 10, 11, 12, 13], [14, 15, 16, 17, 18, 19, 20]];
      let calendarBody = "";

      for (let i = 0; i < days.length; i++) {
        calendarBody += "<tr>";
        for (let j = 0; j < days[i].length; j++) {
          let dayDuong = days[i][j];
          let dayAm = amDays[i][j];
          let selectedClass = (dayDuong === 11) ? "selected" : "";
          if(dayDuong == 'undefined' && dayAm == 'undefined') {
            calendarBody += `<td class="disable"></td>`;
          }
          else {
            calendarBody += `<td class="${selectedClass}" data-day="${dayDuong}">
                                        <div class="day-duong">${dayDuong}</div>
                                        <div class="day-am">${dayAm}</div>
                                    </td>`;
          }

        }
        calendarBody += "</tr>";
      }

      $("#calendarBody").html(calendarBody);

      $(".calendar td").click(function () {
        $(".calendar td").removeClass("selected");
        $(this).addClass("selected");
        $("#selectedDate").text($(this).data("day"));
      });
    });
  </script>

</html>
@endsection
