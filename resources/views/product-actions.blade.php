<a href="{{ route('product.edit', $data->id) }}" class="edit btn btn-primary btn-sm">Edit</a>
<a href="" class="edit btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-user-{{ $data->id }}').submit();">Delete</a>
<form id="delete-user-{{$data->id}}" action="{{ route('product.destroy', $data->id) }}" method="POST" style="display: none;">
@method('DELETE')
@csrf
</form>
