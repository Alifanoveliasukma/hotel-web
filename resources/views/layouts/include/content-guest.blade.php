@if(auth()->user()->role == 'guest')
<div class="container">
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Profil</h2>
                    <div class="panel">
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            
                            <div class="card">
                                <div class="card-body">
                                <h4>My Profile</h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>No HP</td>
                                            <td>:</td>
                                            <td>{{$user->nohp}}</td>
                                        </tr>
                                    
                                    </tbody>
                                </table>  
                                </div> 
                            </div>
                            <div class="card">
                <div class="card-body">
                    <h4>Edit Profile</h4>
                    <p>Silahkan lengkapi data diri terlebih dahulu</p>
                    <form method="post" action="/profile/tamu">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('No HP') }}</label>

                            <div class="col-md-6">
                                <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{$user->nohp}}" required autocomplete="nohp" autofocus>

                                @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success update-pro">
                                    <a>Update</a>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
                        </div>                    
                        </div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    

@endif