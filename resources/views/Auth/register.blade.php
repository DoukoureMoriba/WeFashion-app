<form method="POST" action="{{route('register_user')}}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="name" class="form-control" id="name" name="name" >
      </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3 form-check">
      {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>