@extends('layout.admin')
@section('admin')


  <style>
    

@media print {
 .table, .table__body {
  overflow: visible;
  height: auto !important;
  width: auto !important;
 }
}





main.table {
    
    height: 90vh;
    margin-left: 10px;
    margin-top: 40px;

    backdrop-filter: blur(7px);
    
    border-radius: .8rem;

    overflow: hidden;
}

.table__header {
    width: 100%;
    height: 10%;
    background-color: #fff4;
    padding: .8rem 1rem;

    display: flex;
    justify-content: space-between;
    align-items: center;
    
}

.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(89% - 1.6rem);
    background-color: #fffb;

    margin: .8rem auto;
    border-radius: .6rem;

    overflow: auto;
    overflow: overlay;
}


.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
}


table {
    width: 100%;
}

td img {
    width: 36px;
    height: 36px;
  
    border-radius: 50%;
    margin-right: .5rem;
    vertical-align: middle;
}

table, th, td {
    border-collapse: collapse;
    padding: 1rem;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color:rgb(165 170 209);
    cursor: pointer;
    text-transform: capitalize;
    text-align: start;
}


tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
    background-color: #ebc474;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 1rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #000000;
}

thead th:hover {
    color: #ffffff;
}
.btn {
  padding: 17px 15px;
  border-radius: 50px;
  cursor: pointer;
  border: 0;
  background-color: white;
  box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  font-size: 10px;
  transition: all 0.5s ease;
}

.btn:hover {
  letter-spacing: 3px;
  background-color: #08145a;
  color: hsl(0, 0%, 100%);
  box-shadow: #08145a 0px 7px 29px 0px;
}

.btn:active {
  letter-spacing: 3px;
  background-color:  #08145a;
  color: hsl(0, 0%, 100%);
  box-shadow: #08145a 0px 0px 0px;
  transform: translateY(10px);
  transition: 100ms;
}


.button {
  position: relative;
  width: 150px;
  height: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  border: 1px solid  #08145a;
  background-color:  #08145a;
}

.button, .button__icon, .button__text {
  transition: all 0.3s;
}

.button .button__text {
  transform: translateX(30px);
  color: #fff;
  font-weight: 600;
}

.button .button__icon {
  position: absolute;
  transform: translateX(109px);
  height: 100%;
  width: 39px;
  background-color: #08145a;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button .svg {
  width: 30px;
  stroke: #fff;
}

.button:hover {
  background: white;
}

.button:hover .button__text {
  color: transparent;
}

.button:hover .button__icon {
  width: 148px;
  transform: translateX(0);
}

.button:active .button__icon {
  background-color: #08145a;
}

.button:active {
  border: 1px solid #08145a;
}

.href{
    text-decoration: none
}
.btnn {
  --primary-color: #9f9aff;
  --secondary-color: #fff;
  --hover-color: #111;
  --arrow-width: 10px;
  --arrow-stroke: 2px;
  box-sizing: border-box;
  border: 0;
  border-radius: 20px;
  color: var(--secondary-color);
  padding: 1em 1.8em;
  background: var(--primary-color);
  display: flex;
  transition: 0.2s background;
  align-items: center;
  gap: 0.6em;
  font-weight: bold;
}

.btnn .arrow-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
}

.btnn .arrow {
  margin-top: 1px;
  width: var(--arrow-width);
  background: var(--primary-color);
  height: var(--arrow-stroke);
  position: relative;
  transition: 0.2s;
}

.btnn .arrow::before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  border: solid var(--secondary-color);
  border-width: 0 var(--arrow-stroke) var(--arrow-stroke) 0;
  display: inline-block;
  top: -3px;
  right: 3px;
  transition: 0.2s;
  padding: 3px;
  transform: rotate(-45deg);
}

.btnn:hover {
  background-color: var(--hover-color);
}

.btnn:hover .arrow {
  background: var(--secondary-color);
}

.btnn:hover .arrow:before {
  right: 0;
}
a{
    text-decoration: none;
}
.buttonn {
  background-color: green;
  color: #fff;
  width: 95px;
  height: 2.9em;
  border: green 0.2em solid;
  border-radius: 100px;
  text-align: right;
  transition: all 0.6s ease;
}

.buttonn:hover {
  background-color: green;
  cursor: pointer;
}

.buttonn svg {
  width: 1.6em;
  margin: -0.2em 0.8em 1em;
  position: absolute;
  display: flex;
  transition: all 0.6s ease;
}

.buttonn:hover svg {
  transform: translateX(5px);
}

.text {
  margin: 0 1.5em
}

    </style>
    @if(session('message'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Valid...",
            text: @json(session('message')),
        });
    </script>
@endif
    <main class="table" id="customers_table">
     
    
        <section class="table__body">
            <table>
                <thead>
                    <tr class="content">
                        <th>Username</th>
                        <th>company</th>
                        <th>budget</th>
                        <th>collaborator</th>
                        <th>destination</th>
                        <th>date</th>
                        <th>description</th>
                        <th></th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    @if(auth()->check()) 
                    @foreach($formule as $formule)
                        <tr>
                            <td>{{$formule->profile->Username}}</td>
                            <td>{{ $formule->company}}</td>
                            <td>{{ $formule->budget}}</td>
                            <td>{{ $formule->collaborator }}</td>
                            <td>{{ $formule->destination }}</td>
                            <td>{{ $formule->date }}</td>
                            <td>{{ $formule->description }}</td>
                            <td>
                               @if($formule->is_validated)
                               Validé                                   
                              
                                   
                               @elseif($formule->is_refuser)
                                   Reffusé
                               @endif
                             
                            </td>
                         
                
                    
  
 
                         
                           
                        </tr>
                        
                    @endforeach
                @endif
                </tbody>
            </table>
        </section>
    </main>
    
    @endsection