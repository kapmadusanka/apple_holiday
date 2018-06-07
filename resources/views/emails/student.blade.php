<table id="datatable" class=" table table-striped " >
    <thead>
    <tr>
        <th> # </th>
        <th> Student Name </th>
        <th> Student age </th>
        <th> Parent Name </th>
        <th> Student Class </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($records as $k => $row)
    <tr>
        <td> {{ $k+1}} </td>
        <td>{{ $row->get_student->name }} </td>
        <td>{{ $row->get_student->student_age }} </td>
        <td>{{ $row->get_parent->name }} </td>
        <td>{{ $row->get_student->class_name }} </td>

    </tr>
    @endforeach
    </tbody>
</table>