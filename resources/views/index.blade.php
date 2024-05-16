<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container">
        
        <h1 class="text-center pt-4 ">Crud<strong class="text-danger">Laravel</strong></h1>
        <hr>

        <div class="row py-2">
            <div class="col-md-6">
                <h2><a href="/post/create" class="btn btn-success">Qoshish</a></h3>
            </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <form method="get" action="/search">
                        <div class="input-group">
                            <input class="form-control" name="search" placeholder="Qidiruv..." value="{{ isset($search) ? $search : ''}}">
                            <button type="submit" class="btn btn-primary">Qidiruv</button>
                        </div>
                    </form>
    
                </div>
            </div>
        </div>

        

         <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">image</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <!-- <th scope="col">Category Name</th> -->
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            @foreach ($posts as $post)
            <tbody>


                <th scope="col">{{$post->id}}</th>
                <th scope="col"><img src="{{asset('storage/'.$post->image)}}" style="width: 100px; height: 100px; border-radius: 10%;"></th>
                <th scope="col">{{$post->name}}</th>    
                <th scope="col">{{$post->title}}</th>
                <!-- <th scope="col">{{$post->category_id}}</th> -->
                <th scope="col">{{$post->description}}</th>
                <th scope="col"><form action="{{route('post.destroy', $post->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">O'chirish</button>
                </form>       
                </th>




            </tbody>
            @endforeach
          </table>
        
    </div>
   
</body>
</html>

