<div class="row" >
    <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist"
        style="
            border-top: 1px solid #eaeaea; 
            border-bottom: 1px solid #eaeaea; 
            padding : 1.25rem 0px ; 
        "
    >
        <li class="nav-item" role="presentation">
          <button class="nav-link active desc_btn" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
            Description
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link desc_btn" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
            Avis ({{count($comms)}})
          </button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">                      
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row" style="margin-top: 6.25rem">
                <div class="col-12 col-md-6" id="content">
                </div>
                <div class="col-12 col-md-6 img_description_container">
                    <div class=" px-2 px-md-5 img_description_content">
                        <img class="img-fluid" src="{{asset('storage/products/thumbnail/'. $product->folder."/". $product->thumb)}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            {{-- Make Livewire component to Make the commentaire form functionnal --}}
            <div class="row">
                <div class="col-12" id="review_section" >
                    <h4 class="review_title">
                        {{ count($comms) }} review for {{$product->name}}
                    </h4>
                    
                    @if(session()->has("success"))
                        <div class="col-12 py-2 px-4 alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
            
                    @if(session()->has("error"))
                        <div class=" col-12 py-2 px-4 alert alert-danger" role="alert">
                            {{ session()->get('error') }}
                        </div>
                    @endif
        
                    @foreach ($comms as $comment)
                        <div class="d-flex commentaire_container" >
                            {{-- <div class="profile_pic">
                                <img src="{{asset('images/4.jpg')}}" alt="" class="img-fluid">
                            </div> --}}
                            <div class="profile_details">
                                <h5>
                                    <span class="profil_name">{{$comment->nom}}</span>
                                    - 
                                    <span class="com_date">{{$comment->created_at}}</span> 
                                </h5>
                                <div class="review_content">
                                    <p>
                                        {{$comment->message}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
        
        {{-- 
                    <div class="d-flex commentaire_container" >
                        <div class="profile_pic">
                            <img src="{{asset('images/4.jpg')}}" alt="" class="img-fluid">
                        </div>
                        <div class="profile_details">
                            <h5>
                                <span class="profil_name">Martine Katrine</span>
                                 - 
                                <span class="com_date">04/07/2023</span> 
                            </h5>
                            <div class="review_content">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur 
                                    adipisicing elit. Ullam cumque, temporibus 
                                    vel doloremque totam omnis suscipit earum modi 
                                    ad voluptate, repellendus et iusto tempora 
                                    reiciendis dolores at ratione, eaque autem aspernatur velit consequuntur facere qui commodi exercitationem? Eius sed eaque dolores harum 
                                    quas saepe at eum officia similique. Alias, id!
                                </p>
                            </div>
                        </div>
                        
                    </div> --}}
        
                </div>
                <div class="col-12 " style="padding-top: 50px">
                    <h5>Ajoutez votre avis</h5 >
                    {{-- <span>Your email address will not b published. Required fields are marked *</span> --}}
                    <form action="" class="row mt-3">
                        <div class="col-12 form-group">
                            <label for="shipping-form-message">Votre message:</label>
                            <textarea class="form-control" placeholder="Ecrivez votre avis ici" wire:model.defer="comment.message" rows="6"></textarea>
                            @error('comment.message') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <label for="billing-form-name">Nom:</label>
                            
                            <input type="text" placeholder="Entez votre nom" id="billing-form-name" wire:model.defer="comment.nom" class="form-control" />
                            @error('comment.nom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 form-group  mt-3">
                            <label for="billing-form-email">Email Adresse:</label>
                            <input type="email" placeholder="Entrez votre email" id="billing-form-email" wire:model.defer="comment.email" class="form-control" />
                            @error('comment.email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
        
                        <div class="col-md-6 form-group  mt-3">
                            <a wire:click="sendComment" class="button button-3d button-black">Ajouter le commentaire</a>
                        </div>
        
                    </form>
                </div>
            </div>
        
        
        </div>  

    </div>



    <script>
        let content = @js($content) ; 
        // console.log(content); 

        content.forEach(element => {
            switch(element.type){
                case "paragraph" : {
                    var paragraph = document.createElement("p");
                    paragraph.classList.add("desc_para");
                    paragraph.innerHTML  = element.data.text;

                    const contentDiv = document.getElementById('content'); 
                    contentDiv.appendChild(paragraph);
                    break;
                };
                case "header" : {
                    if(element.data.level == "2"){
                        var heading = document.createElement("h2");
                        heading.classList.add("desc_title");
                        heading.innerHTML  = element.data.text;
                        const contentDiv = document.getElementById('content'); 
                        contentDiv.appendChild(heading);
                        break;
                    }else if(element.data.level == "3"){
                        var heading = document.createElement("h3");
                        heading.classList.add("desc_title");
                        heading.innerHTML  = element.data.text;
                        const contentDiv = document.getElementById('content'); 
                        contentDiv.appendChild(heading);
                        break;
                    }
                };
                case "list" : {
                    // Create a new ul element
                    var list = document.createElement("ul");

                    // Add the "x" class to the ul element
                    list.classList.add("desc_list");
                    // Loop through the items array
                    for (var i = 0; i < (element.data.items).length; i++) {
                        // Create a new li element
                        var listItem = document.createElement("li");
                        listItem.classList.add("desc_list-item");
                        // Set the text content of the li element
                        listItem.textContent = element.data.items[i];

                        // Append the li element to the ul element
                        list.appendChild(listItem);
                    }
                    const contentDiv = document.getElementById('content'); 
                    contentDiv.appendChild(list);
                    break;
                }
                
            }
        });


        // Get container


    </script>
</div>