<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>table excel hasil kerawanan</title>
  <style>
    th {
      width: 100px 80px;
      padding: 2% 4%;
      background: #9BC2E6;
    }


  </style>
</head>
<body>
  <table>
    <thead>
        <tr>
            <th style="height: 25px; background: #9BC2E6; display: flex; align-items: center; font-size: 12px; font-weight: 600; text-align: center">Id</th>
            <th style="width: 120px;height: 25px;  background: #9BC2E6; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: 600; text-align: center">Murid</th>
            <th style="width: 150px;height: 25px;  background: #9BC2E6; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: 600; text-align: center">Wali Kelas</th>
            <th style="width: 170px;height: 25px;  background: #9BC2E6; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: 600; text-align: center">Kerawanan</th>
            <th style="width: 130px;height: 25px;  background: #9BC2E6; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: 600; text-align: center">Guru Bk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($getkerawanan as $item)
            {{-- @if ($item->hasil_konseling == null) --}}
            {{-- @else --}}
                {{-- @if ($item->guru_id == Auth::id()) --}}
                <tr>
                    <td style="text-align: center">
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->murid->name }}
                    </td>
                    <td>
                        {{ $item->walass->name_guru }}
                    </td>
                    <td>
                        {{ $item->jeniskerawanan->jenis_kerawanan }}
                    </td>
                    <td>
                      {{ $item->gurus->name }}
                    </td>
                </tr>
                {{-- @endif --}}
                {{-- @endif --}}
            @endforeach
    </tbody>
</table>
</body>
</html>




      

      
