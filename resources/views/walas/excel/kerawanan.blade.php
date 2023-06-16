<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <table class="table-data" aria-label="TABLE">
    <thead>
      <tr role="row">
        <th style="height: 25px; background: #9BC2E6; display: flex; align-items: center; font-size: 12px; font-weight: 600; text-align: center">id</th>
        <th  style="width: 120px;height: 25px;  background: #9BC2E6; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: 600; text-align: center">Nama Murid</th>
        <th  style="width: 120px;height: 25px;  background: #9BC2E6; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: 600; text-align: center">Wali Kelas</th>
        <th  style="width: 120px;height: 25px;  background: #9BC2E6; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: 600; text-align: center">Guru Bimbingan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($getkerawanan as $item)
      @if ($item->kesimpulan == null)
          @if ($item->walas_id == Auth::id())
              <tr>
                  <td style="text-align: center">{{ $item->murid_id }}</td>
                  <td>{{ $item->murid->name }}</td>
                  <td>{{ $item->walass->name_guru }}</td>
                  {{-- <td>{{ $item->layanan->jenis_layanan }}</td> --}}
                  <td>{{ $item->gurus->name }}</td>
              </tr>
          @endif
      @else
      @endif
  @endforeach
  </tbody>
  </table>




        {{-- @foreach ($kerawanan as $item)
      <tr role="row">
        <td class="table-info-center">{{ $item->user_id }}</td>

        @foreach ($getMurid as $get)
        <td class="table-info-center">{{ $get->user_id }} {{ $get->name }}td>
        @endforeach
        

        @foreach ($getMurid as $get)
        <td class="table-info-center">{{ $get->user_id }} {{ $get->name }}</td>                            
        @endforeach

        
        @foreach ($getGurubk as $get)
        <td class="table-info-left">{{ $get->user_id }}{{ $get->name }}</td>
        @endforeach


        <td class="table-info-center"> {{ $item->tgl_lahir }}</td>
        <td class="table-info-center">{{ $item->nip }}</td>
        <td class="table-info-center">{{ $item->jenis_kelamin }}</td>
    --}}


    {{-- <script>
        $(document).ready(function() {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('action_kerawanan') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function() {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script> --}}


      

      
