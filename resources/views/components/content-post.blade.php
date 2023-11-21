<div class="content-post">
    <div class="box margin-down-small pos-relative">
        <div class="row items-flex margin-down-small">
            <div class="col items-flex align-center w50">
                <figure class="img-user-default margin-right-small items-flex align-center">

                    <img src="{{ url($post['user']['foto']['caminho']) }}" />
                </figure>
                <div class="margin-left-small">
                    <h6>{{ $post['user']['nome']}}</h6>
                    <p class="small">{{$post->created_at ?? old('created_at') }}</p>
                </div>
            </div>
            <div class="col items-flex align-center just-end w50">
                <a href="{{ route('inicio' ) }}" class="button bgBlackWeakIn"><i class="ri-eye-line"></i></a>
            </div>
        </div>
        <div class="row">
            <h5 class="margin-down-small-in">{{ $post['user']['nome'] . " " . $post->descricao ?? old('title') }}</h5>
            <p class="description">{{$post->descricao ?? old('content') }}</p>
            <figure class="content-figure img-post-default margin-top-small text-center" style="width: 50%; height: 50%;">
                <?php
                $music = $post['arqs']['caminho'] ?? old('image');
                ?>
                <audio controls>
                    <source src="{{url($music)}}" type="audio/ogg">
                </audio>
            </figure>
        </div>
        <div class="row margin-top-small">
            <ul class="col items-flex align-center">
                <li class="message action-post margin-right-default">
                    <button class="accordion"><i class="ri-message-3-line"></i> <span>Comentar</span></button>
                    <form  method="post" action="{{ route('inicio') }}" class="w100 message-content accordion-content items-flex align-center just-space-between margin-down-small">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Session::get('id') }}" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <input type="text" name="comment" class="bgBlackWeakIn w90" placeholder="Seu comentário" />
                        <button type="send" class="bgBlackWeakIn"><i class="ri-send-plane-line"></i></button>
                    </form>
                </li>
                <li class="message action-comments">
                    <button class="accordion"><i class="ri-eye-line"></i><span>Ver comentários</span></button>
                    <div class="see-comments accordion-content box margin-down-small">
                        <ul class="w100">
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

