@foreach ($data as $subject)
    <p>{{ $subject->name }}</p>
@endforeach
<a href="/newSubject">추가</a>