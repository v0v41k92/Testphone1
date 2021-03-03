<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
  <p class="h5 my-0 me-md-auto fw-normal">Телефонная книга</p>
  <nav class="my-2 my-md-0 me-md-3"><ul class="topmenu">
    <li><a class="p-2 text-dark" href="/">Главная</a></li>
    <li><a class="p-2 text-dark" href="{{route('contact')}}">Запись</a></li>
    <li><a class="p-2 text-dark" href="/">Файл<span class="fa fa-angle-down"></span></a>
      <ul class="submenu">
          <li><a href="/" onclick="createXML();">Экспорт контактов</a></li>
          <li><a href="/uploadfile">Импорт контактов</a></li>
      </ul>
    </li>
    <li><a class="p-2 text-dark" href="{{route('search')}}">Поиск</a></li>
  </ul></nav>
</header>
