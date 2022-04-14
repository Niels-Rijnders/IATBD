<li class="a-popup u-list-style-none gridCard" data-kind-of-animal={{$animal->species}}>
    <a href="/animal/{{$animal->id}}">
        <article class="">
            <header class="gridCard__header u-flex-v-center">
                <h2 class="gridCard__heading"> {{$animal->species}} {{$animal->name}} </h2>
            </header>
            <figure class="gridCard__figure">
                <img class="gridCard__image" src={{$animal->image}} alt={{$animal->name . " " . $animal->species}} />
            </figure>
            <section class="gridCard__textSection u-flex-v-center">
                <p class="gridCard__text">{{$animal->description}}</p>
            </section>
        </article>
    </a>
</li>