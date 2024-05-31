@extends('layout.app')
@section('hello')


<style>
/* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

.containerform {
    position: relative;
    max-width: 700px;
    width: 100%;
    background: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    margin-left: 100px;
}

.containerform header {
    font-size: 1.5rem;
    color: rgb(48, 58, 141);
    font-weight: 500;
}

.containerform .form {
    margin-top: 30px;
}

.form .input-box {
    width: 100%;
    margin-top: 20px;
}

.input-box label {
    color: rgb(36, 55, 147);
}

.form :where(.input-box input, .select-box) {
    position: relative;
    height: 50px;
    width: 100%;
    outline: none;
    font-size: 1rem;
    color: rgb(0, 0, 0);
    margin-top: 8px;
    border: 1px solid #000080;
    border-radius: 6px;
    padding: 0 15px;
}
.select-box select {
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    color: #707070;
    font-size: 1rem;
}
.select-box:hover {
    color: #707070;
}
.btn {
    color: rgb(17, 3, 108);
    text-transform: uppercase;
    text-decoration: none;
    border: 2px solid rgb(17, 3, 108);
    padding: 10px 20px;
    font-size: 17px;
    font-weight: bold;
    background: transparent;
    position: relative;
    transition: all 1s;
    overflow: hidden;
    margin-top: 20px;
    border-radius: 8px;
}

.btn:hover {
    z-index: 100;
    color: rgb(255, 255, 255);
}

.btn::before {
    content: '';
    position: absolute;
    height: 100%;
    width: 0%;
    top: 0;
    left: -40px;
    transform: skewX(45deg);
    background-color: rgb(34, 19, 131);
    transition: all 1s;
    z-index: -1;
}

.btn:hover::before {
    width: 160%;
}
</style>
@if($errors->any())
    @foreach($errors->all() as $error)
    <script>
       Swal.fire({
            icon: "error",
            title: "Oops...",
            text: @json($error),
        });
    </script>
    @endforeach
@endif

@if(session('message'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Valid...",
            text: @json(session('message')),
        });
    </script>
@endif

<section class="containerform"> 
    <header>Dépenses</header>
    
    <form action="{{ route('formulaire.post') }}" method="POST" class="form"> 
        @csrf
        <div class="select-box">
            <select name="company">
                <option hidden>Entreprise</option>
                <option>Sofamel</option>
                <option>Bitmar</option>
                <option>Lux Lighting</option>
                <option>Marcont</option>
                <option>Madin Technologies</option>
                <option>Madin Immobilier</option>
                <option>Neoplus</option>
                <option>Switch Electric</option>
                <option>PEC Group</option>
            </select>
        </div>

        <div class="input-box">
            <label>Budget</label>
            <input name="budget" type="text" placeholder="Budget(DH)" />
        </div>
        <div class="input-box">
            <label>Collaborateur</label>
            <input name="collaborator" type="text" placeholder="Collaborateur" />
        </div>

        <div class="column">
            <div class="input-box">
                <label>Destination</label>
                <input name="destination" type="text" placeholder="Destination" />
            </div>
            <div class="input-box">
                <label>Date</label>
                <input name="date" type="date" placeholder="Enter date" />
            </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Description</label>
                <input name="description" type="text" placeholder="Description" />
            </div>
        </div>
        <button class="btn">
            Confirmer
        </button>
    </form>
</section>


@endsection
