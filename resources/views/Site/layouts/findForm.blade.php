            <form id="search" action="{{ route('search') }}" method="GET" >
               {{--@csrf --}}
               <input class="input-wrapper" type="text" name="text" id="text" placeholder="Поиск новостей и проектов">
               <select class="sel" name="category">
                 <option value="0">Проекты</option>
                 @foreach($categories_list as $cat)

                 <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                 @endforeach
                 
             </select>
               <button type="submit"><i class="fa fa-search"></i></button>
           </form>


 
       