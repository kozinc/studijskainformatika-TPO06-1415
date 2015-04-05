<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
</head>
<body>
    <h2>{{ $title }}</h2>
    <table>
        <?php
            $i=0;
        ?>
        @foreach($content as $row)
            @if($i == 0)
                <tr>
                    @foreach($row as $col)
                        <th>{{ $col }}</th>
                    @endforeach
                </tr>
            @else
                <tr>
                    @foreach($row as $col)
                        <td>{{ $col }}</td>
                    @endforeach
                </tr>
            @endif
        @endforeach

    </table>
</body>
</html
