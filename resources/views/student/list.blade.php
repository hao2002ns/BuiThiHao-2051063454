@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-12 text-center pt-5">
			<h1 class="display-one m-5">PHP Laravel Project - CRUD</h1>
			<div class="text-left"><a href="{{URL::to('student/create')}}" class="btn btn-outline-primary">Add new
				product</a></div>

			<table class="table mt-3  text-left">
				<thead>
					<tr>
						<th scope="col">id</th>
						<th scope="col">fullname</th>
						<th scope="col">birthday</th>
                        <th scope="col">address</th>
					</tr>
				</thead>
				<tbody>
					@forelse($Student as $Student)
					<tr>
						<td>{!! $Student->id !!}</td>
                        <td>{!! $Student->fullname !!}</td>
                        <td>{!! $Student->birthday !!}</td>
                        <td>{!! $Student->address !!}</td>
			
						<td><a href={{URL::to('student/edit',['id'=>$Student->id])}}
							class="btn btn-outline-primary">Edit</a>
							<a href="{{URL::to('student/delete', ['id'=>$Student->id])}}" class="btn btn-outline-danger ml-1" onclick="showModel()">DELETE</a>
                        </td>
					</tr>
					@empty
					<tr>
						<td colspan="3">No products found</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal fade" id="deleteConfirmationModel" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">Are you sure to delete this record?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onClick="dismissModel()">Cancel</button>
				<form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
			</div>
		</div>
	</div>
</div>

<script>
function showModel() {
	var frmDelete = document.getElementById("delete-frm");
	frmDelete.action = 'student';
	var confirmationModal = document.getElementById("deleteConfirmationModel");
	confirmationModal.style.display = 'block';
	confirmationModal.classList.remove('fade');
	confirmationModal.classList.add('show');
}

function dismissModel() {
	var confirmationModal = document.getElementById("deleteConfirmationModel");
	confirmationModal.style.display = 'none';
	confirmationModal.classList.remove('show');
	confirmationModal.classList.add('fade');
}
</script>
@endsection