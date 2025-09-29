@extends("client.layout.master")

@section("meta_title")
  Category list
@endsection

@section("content")
  <div
    class="table-responsive"
  >
    <table
      class="table table-striped"
    >
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Slug</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr class="">
            <td scope="row">{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
              <a 
                href="{{ route("product.showProductsByCategoryID", ["category_id" => $category->id]) }}"
              >
                View products
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection