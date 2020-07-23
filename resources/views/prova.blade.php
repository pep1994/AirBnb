<div class="col-md-10 offset-1">
  <div class="card flex-md-row mb-4 box-shadow h-md-250 onHover">
    <div class="col-md-4  d-flex justify-content-center align-items-center">
      <img width="100%" class="card-img-right flex-auto d-none d-md-block"

        src="storage/@{{img}}"

      alt="Card image cap">
    </div>
    <div class="col-md-4">
      <div class="card-body d-flex flex-column align-items-start">

        <h3 class="mb-0">
          <a class="text-dark" href="/show/@{{ id }}"> @{{title}} </a>
        </h3>
        <p>
          <span>Posti Letto: @{{beds}}</span> <br>
          <span>Numero di stanze: @{{rooms}}</span> <br>
          <span>Bagni: @{{bath}}</span> <br>
          <div class="hr_container">
            <hr style="height:1px; color: lightgrey; width:100%; margin:2px 0;">
            <span class="total_prc">@{{ price }} € - Totale</span>
          </div>
        </p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="from_bottom">
        <a href="/show/@{{ id }}" class="btn bnb_btn">Vai all'appartamento</a>
      </div>
    </div>
  </div>
</div>
<!-- FIX OFFSET -->
<div class="col-md-1"></div>
