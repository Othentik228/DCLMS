@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">Tous les étudiants</h2>
                </div>
                <div class="offset-md-6 col-md-2">
                    <a class="add-new" href="{{ route('student.create') }}">Ajouter un étudiant</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>S.No</th>
                            <th>Nom et prénom</th>
                            <th>Sexe</th>
                            <th>Numéro de Tel</th>
                            <th>Email</th>
                            <th>Voir</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td class="id">{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td class="text-capitalize">{{ $student->gender }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td class="view">
                                        <button data-sid='{{ $student->id }}>'
                                            class="btn btn-primary view-btn">Voir</button>
                                    </td>
                                    <td class="edit">
                                        <a href="{{ route('student.edit', $student) }}>" class="btn btn-success">Editer</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('student.destroy', $student->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-student">Supprimer</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Aucun étudiant trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $students->links('vendor/pagination/bootstrap-4') }}
                    <div id="modal">
                        <div id="modal-form">
                            <table cellpadding="10px" width="100%">

                            </table>
                            <div id="close-btn">X</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript">
        //Show shudent detail
        $(".view-btn").on("click", function() {
            var student_id = $(this).data("sid");
            $.ajax({
                url: "http://127.0.0.1:8000/student/show/"+student_id,
                type: "get",
                success: function(student) {
                    console.log(student);
                    form ="<tr><td>Student Nom et prénom :</td><td><b>"+student['name']+"</b></td></tr><tr><td>Addresse :</td><td><b>"+student['address']+"</b></td></tr><tr><td>sexe :</td><td><b>"+ student['gender']+ "</b></td></tr><tr><td>Filière :</td><td><b>"+ student['class']+ "</b></td></tr><tr><td>Age :</td><td><b>"+ student['age']+ "</b></td></tr><tr><td>Numéro de Tel :</td><td><b>"+ student['phone']+ "</b></td></tr><tr><td>Email :</td><td><b>"+ student['email']+ "</b></td></tr>";
          console.log(form);

                    $("#modal-form table").html(form);
                    $("#modal").show();
                }
            });
        });

        //Hide modal box
        $('#close-btn').on("click", function() {
            $("#modal").hide();
        });

        //delete student script
        $(".delete-student").on("click", function() {
            var s_id = $(this).data("sid");
            $.ajax({
                url: "delete-student.php",
                type: "POST",
                data: {
                    sid: s_id
                },
                success: function(data) {
                    $(".message").html(data);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
        });
    </script>
@endsection
