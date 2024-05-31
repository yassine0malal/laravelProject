@extends('layout.app')
@section('hello')
    <style>
        .bonjour{
          position: relative;
          top: 50px;
          left: 450px;


        }
        h3{
            color: rgb(143, 143, 188);
            font-weight: 900;
            font-size: 20px;
        }
        .grid-cols-2 {
  width: 100%;
  height: 100%;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 4rem;
}
.grid-item-1 {
  padding-top: 5rem;
  padding-left: 1.5rem;
  margin: 30px;

}

.main-heading span {
  color: var(--primary-color);
}
.info-text {
  margin-top: 1.5rem;
  font-size: 19px;
  line-height: 28px;
  color: #334157;
}
.btn_wrapper {
  margin-top: 3.5rem;
  display: flex;
  width: 100%;
}
.btn {
  width: 110px;
  height: 50px;
  background-color: var(--primary-color);
  display: block;
  font-size: 16px;
  color: #fff;
  text-transform: capitalize;
  border-radius: 7px;
  letter-spacing: 1px;
  transition: 0.4s;
}
.btn:hover {
  transform: translateY(-3px);
  background-color: var(--btn-hover-color);
}
.main-heading span{
    color: #0e2a86;
}

.documentation_btn {
  width: 150px;
  height: 55px;
  font-size: 16px;
  font-weight: 500;
  color: #fff;
  letter-spacing: 0;
  background-color: #e1e7fc;
  color: #0e2a86;
  box-shadow: 0 0.5rem 1.5rem rgba(22, 28, 45, 0.1);
  border: none;
}
.documentation_btn:hover {
  background-color: #d7ddf1;
  transition: box-shadow 0.25s ease, transform 0.25s ease;
}

.team_img_wrapper {
  width: 500px;
  max-width: 100%;
  height: 440px;
}
.team_img_wrapper img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}








/* ==== MEDIA QURIES FOR RESPONSIVE DESIGN ==== */


    </style>

<section class="wrapper">
    <div class="container">
      <div class="grid-cols-2">
        <div class="grid-item-1">
          <h1 class="main-heading">
            Salut <span>{{$profile->Username}}</span>
            <br />
            Bienvenue sur votre application ! 
          </h1>
          <p class="info-text">
            Quelles notes de frais voulez-vous traiter aujourd'hui ?
          </p>

          <div class="btn_wrapper">
            
            <a href="{{route('pdf')}}">
            <button class="btn documentation_btn">Télécharger </button>
          </a>
          </div>
        </div>
        <div class="grid-item-2">
          <div class="team_img_wrapper">
            <img src="/images/frais.png" alt="team-img" />
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection