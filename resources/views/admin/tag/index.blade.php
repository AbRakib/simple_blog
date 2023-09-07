@extends('admin.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Tags</h1>
        </div>
        <div class="col-md-6 text-end">
            <button class="text-center btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Tag</button>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="example">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->name }}</td>
                <td class="text-end">
                    <button class="btn btn-secondary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 mx-auto" id="exampleModalLabel">Add Tag</h1>
        </div>
        <div class="modal-body">
          <form id="tagForm" method="post">
            @csrf
            <div class="alert-danger error"></div>
            <div class="form-group">
                <input type="text" class="form-control border-2" name="name" id="tag" placeholder="Tag Name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="tagSubmit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
    
@endsection

@section('script')
    <script>
        $(document).on("click", "#tagSubmit", function (e) {
            e.preventDefault();
            var data = $("#tagForm").serialize();
            console.log(data);
            $.ajax({
                type: "post",
                url: "{{ route('tagStore') }}",
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response.success);
                    $(".modal").modal('hide');
                    $(".table").load(location.href+' .table');
                    $("#tagForm")[0].reset();
                },
                error: function (error) {
                  console.log(error);
                  $('.error').show();
                  $('.error').append('<p class="p-2">'+error.responseJSON.message+'</p>');
                }
            });
        });
    </script>
@endsection