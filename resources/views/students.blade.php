<ul>

@foreach($students as $student)
<li>
<a href="https://xpertbotacademy.online/students/{{$student->uuid}}" target="_blank">{{$student->name}}</a>
@endforeach()
</li>
</ul>