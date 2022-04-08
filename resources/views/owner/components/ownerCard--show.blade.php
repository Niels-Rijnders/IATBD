<article class="showCard  a-popup" data-species-of-animal={{$owners->species}}>
    <header class="showCard__header u-flex-v-center">
                <h2 class="gridCard__heading">{{$owners->name}}</h2>
        </header>
        <figure class="showCard__figure u-flex-v-center">
            <img class="userCard__image" src="{{$owners->image}}" alt="{{$owners->name . ' ' . $owners->species}}">
        </figure>
        <section class="showCard__text u-flex-v-center">
            <p>
                {{$owners->description}}
            </p>
        </section>

        <section class="showCard__buttonSection u-flex-v-center">
            <button class="sushiCard__button showCard__button-pick u-flex-v-center" onclick="window.location.href='/owner/{{$owners->id}}/animals'">Dieren van {{$owners->name}} bekijken</button>
            <button class="sushiCard__button showCard__button-back u-flex-v-center" onclick="window.location.href='/owners'">Terug naar overzicht</button>
        </section>

</article>