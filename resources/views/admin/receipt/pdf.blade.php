<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phiếu thu</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }

        .bordered tr th {
            background-color: #f7f7f7;
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
            text-align: center;
        }

        .bordered td {
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
        }

        table {
            border-collapse: collapse;
        }
        /* Para sobrescribir lo que está en div-table.css */
        .divTableCell,
        .divTableHead {
            padding: 0px !important;
            border: 0px !important;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">PHIẾU THU VIỆN PHÍ</h1>
    <table >
        <tr>
            <th style="text-align: left;">Họ tên: </th>
            <td>{{ $info->hsb_hotenkhachhang }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Năm sinh: </th>
            <td>{{ $info->hsb_namsinh }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Số điện thoại: </th>
            <td>{{ $info->hsb_sdt }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Địa chỉ: </th>
            <td>{{ $info->hsb_diachi }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Chuẩn đoán: </th>
            <td>{{ $info->pk_ghichu }}</td>
        </tr>
    </table>
    <h2 style="text-align: center">Đơn thuốc</h2>
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <table class="bordered width-100pc">
                        <tr>
                            <th>STT</th>
                            <th>Tên thuốc</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th>Liều dùng</th>
                            <th>Cách dùng</th>
                        </tr>
                        @php
                            $tongTienThuoc = 0;
                            $sttMedical = 1;
                        @endphp
                        @foreach ($medical as $item)
                        <tr>
                            <td>{{ $sttMedical++ }}</td>
                            <td>
                                {{ $item->thuoc_ten }}
                            </td>
                            <td>
                                {{ $item->ctt_soluong }}
                            </td>
                            <td>
                                @php
                                    $giaThuoc = DB::table('giathuoc')->where('thuoc_ma', $item->thuoc_ma)
                                    ->orderBy('gt_ngay','desc')->first();
                                @endphp
                                {{ number_format($giaThuoc->gt_gia) }}
                            </td>
                            <td>
                                {{ number_format($item->ctt_soluong * $giaThuoc->gt_gia) }}
                            </td>
                            <td>
                                {{ $item->ctt_lieudung }}
                            </td>
                            <td>
                                {{ $item->ctt_cachdung }}
                            </td>

                            @php
                                $tongTienThuoc = $tongTienThuoc + ($giaThuoc->gt_gia * $item->ctt_soluong);
                            @endphp
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="6">TỔNG TIỀN: </th>
                            <th>{{ number_format($tongTienThuoc) }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h2 style="text-align: center">Dịch vụ</h2>
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <table class="bordered width-100pc">
                        <tr>
                            <th>STT</th>
                            <th>Tên dịch vụ</th>
                            <th>Giá tiền</th>
                        </tr>
                        @php
                            $tongTienDichVu = 0;
                            $sttService = 1;
                        @endphp
                        @foreach ($service as $item)
                        @php
                            $tongTienDichVu = $tongTienDichVu + $item->ctpkdv_gia;
                        @endphp
                            <tr>
                                <td>{{ $sttService++ }}</td>
                                <td>
                                {{ $item->dv_ten }}
                                </td>
                                <td>
                                {{ $item->ctpkdv_gia }}
                                </td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">TỔNG TIỀN: </th>
                            <th>{{ number_format($tongTienDichVu) }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h2 style="text-align: center">Cận lâm sàn</h2>
    <div class="divTable"">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <table class="bordered width-100pc">
                        <tr>
                            <th>STT</th>
                            <th>Cận lâm sàn</th>
                            <th>Giá</th>
                        </tr>
                        @php
                            $tongTienCanLamSan = 0;
                            $sttCanLamSan = 1;
                        @endphp
                        @foreach ($appointmentTest as $item)
                            <tr>
                                <td>{{ $sttCanLamSan++ }}</td>
                                <td>{{ $item->cls_ten }}</td>
                                <td>
                                    @php
                                        $giaCanLamSan = DB::table('giadichvucanlamsan')->where('cls_ma', $item->cls_ma)->orderBy('ngay_ma','desc')
                                        ->first();
                                        print_r(number_format($giaCanLamSan->gdvcls_gia));
                                    @endphp
                                </td>
                            </tr>
                            @php
                                $tongTienCanLamSan = $tongTienCanLamSan + ($giaCanLamSan->gdvcls_gia);
                            @endphp
                        @endforeach
                        <tr>
                            <th colspan="2">TỔNG TIỀN: </th>
                            <th>{{ number_format($tongTienCanLamSan) }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <h4>TỔNG TIỀN THANH TOÁN: {{ number_format($tongTienCanLamSan + $tongTienThuoc + $tongTienDichVu) }} VND</h4>
</body>
</html>
