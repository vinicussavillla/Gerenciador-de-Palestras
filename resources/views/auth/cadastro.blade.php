<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro do participante</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css')}}"> 
</head>
<body>

<h1 class="text-center my-4">Criar conta</h1>

<div class="card shadow my-5 w-75 mx-auto">
    <div class="card-body">

        <form action="{{ route('auth.cadastro.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input
                            type="text"
                            name="user[name]"
                            class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}"
                            placeholder="Nome"
                            value="{{old('user.name')}}"
                        >
                        <div class="invalid-feedback">{{ $errors->first('user.name')}}</div>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group"> 
                        <input
                            type="email"
                            name="user[email]"
                            class="form-control {{ $errors->has('user.email') ? 'is-invalid' : '' }}"
                            placeholder="E-mail"
                            value="{{old('user.email')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('user.email')}}</div>
                    </div>
                </div>

                <div class="col-md-6">  
                    <div class="form-group">     
                        <input
                            type="text"
                            name="user[cpf]"
                            class="form-control cpf {{ $errors->has('user.cpf') ? 'is-invalid' : '' }}"
                            placeholder="CPF"
                            value="{{old('user.cpf')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('user.cpf')}}</div>
                    </div>
                </div>


                <div class="col-12 col-md-6">  
                    <div class="form-group">     
                        <input
                            type="password"
                            name="user[password]"
                            class="form-control {{ $errors->has('user.password') ? 'is-invalid' : '' }}"
                            placeholder="Senha"
                        >
                        <div class="invalid-feedback">{{ $errors->first('user.password')}}</div>
                    </div>
                  </div>

                    <div class="col-12 col-md-6">  
                        <div class="form-group">     
                            <input
                                type="password"
                                name="user[password_confirmation]"
                                class="form-control"
                                placeholder="Confirmar Senha"
                            >
                        </div>
                    </div>
                </div>

            <hr> 

            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="endereco[cep]"
                            class="form-control cep {{ $errors->has('endereco.cep') ? 'is-invalid' : '' }}"
                            id="cep"  
                            placeholder="CEP"
                            value="{{old('endereco.cep')}}"  
                        >
                        <div class="invalid-feedback">{{ $errors->first('endereco.cep')}}</div>
                    </div>
                </div>
            
                <div class="col-md-2">
                    <div class="form-group">
                        <input
                            type="text"
                            name="endereco[uf]"
                            class="form-control uf {{ $errors->has('endereco.uf') ? 'is-invalid' : '' }}"
                            id="uf"
                            placeholder="UF"
                            value="{{old('endereco.uf')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('endereco.uf')}}</div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">
                        <input
                            type="text"
                            name="endereco[cidade]"
                            class="form-control {{ $errors->has('endereco.cidade') ? 'is-invalid' : '' }}"
                            id="cidade"
                            placeholder="Cidade"
                            value="{{old('endereco.cidade')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('endereco.cidade')}}</div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="form-group">
                        <input
                            type="text"
                            name="endereco[rua]"
                            class="form-control {{ $errors->has('endereco.rua') ? 'is-invalid' : '' }}"
                            id="rua"
                            placeholder="Logradouro"
                            value="{{old('endereco.rua')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('endereco.rua')}}</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="endereco[numero]"
                            class="form-control {{ $errors->has('endereco.numero') ? 'is-invalid' : '' }}"
                            placeholder="Número"
                            value="{{old('endereco.numero')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('endereco.numero')}}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="endereco[bairro]"
                            class="form-control {{ $errors->has('endereco.bairro') ? 'is-invalid' : '' }}"
                            id="bairro"
                            placeholder="Bairro"
                            value="{{old('endereco.bairro')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('endereco.bairro')}}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="endereco[complemento]"
                            class="form-control {{ $errors->has('endereco.complemento') ? 'is-invalid' : '' }}"
                            placeholder="Complemento"
                            value="{{old('endereco.complemento')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('endereco.complemento')}}</div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-md-6">  
                    <div class="form-group">     
                        <input
                            type="text"
                            name="telefones[0][numero]"
                            class="form-control telefone {{ $errors->has('telefones.0.numero') ? 'is-invalid' : '' }}"
                            placeholder="Telefone"
                            value="{{old('telefones.0.numero')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('telefones.0.numero')}}</div>
                    </div>
                </div>

                <div class="col-md-6">  
                    <div class="form-group">     
                        <input
                            type="text"
                            name="telefones[1][numero]"
                            class="form-control celular {{ $errors->has('telefones.1.numero') ? 'is-invalid' : '' }}"
                            placeholder="Celular"
                            value="{{old('telefones.1.numero')}}"    
                        >
                        <div class="invalid-feedback">{{ $errors->first('telefones.1.numero')}}</div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block mt-3">
               Criar conta
            </button>

        </form>
    </div>
</div>

    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/auth/cadastro.js')}}"></script>

</body>
</html>