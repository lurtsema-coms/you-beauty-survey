<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <table style="border: 1px solid black;">
    <thead style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <th rowspan="2" style="border: 1px solid black;">Time Stamp</th>
        @for ($i = 1; $i <= 10; $i++)
          @php
           $question = config("global.question_$i");
           $colspan = 1;
           $rowspan = 2;
           if ($question['is_multiple']) {
            $colspan = count($question['options']);
            $rowspan = 1;
           }
           if ($question['with_other']) {
            $colspan += 1;
            $rowspan = 1;
           }
          @endphp
          <th colspan="{{ $colspan }}" rowspan="{{ $rowspan }}" style="border: 1px solid black;">{{ $i }}. {{ $question['question'] }}</th>
          @if ($question['is_multiple'])
          @endif
        @endfor
      </tr>
      <tr>
        @for ($i = 1; $i <= 10; $i++)
          @php
           $question = config("global.question_$i");
          @endphp
          @if ($question['is_multiple'])
            @foreach ($question['options'] as $option)
              <th style="border: 1px solid black;">{{ $option }}</th>
            @endforeach
          @endif
          @if  ($question['with_other'])
            <th style="border: 1px solid black;">Other</th>
          @endif
        @endfor
      </tr>
    </thead>
    <tbody>
      @foreach ($answers as $answer)
        <tr>
          <td style="border: 1px solid black;">{{ Carbon\Carbon::parse($answer['created_at'])->format('Y M j, g:i A, D') }}</td>

          @for ($i = 1; $i <= 10; $i++)
            @php
              $question = config("global.question_$i");
              $key = "question_$i";
            @endphp
            @if ($question['is_multiple'])
              @foreach ($question['options'] as $index => $option)
                @php $keyWithIndex = $key . "_$index"; @endphp
                <td style="border: 1px solid black;">{{ $answer->{$keyWithIndex} }}</td>
              @endforeach
            @else
            <td style="border: 1px solid black;">{{ $answer->{$key} }}</td>
            @endif
            @if ($question['with_other'])
            <td style="border: 1px solid black;">{{ $answer->{$key . '_other'} }}</td>
            @endif
          @endfor
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>