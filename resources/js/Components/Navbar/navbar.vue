<template>
  <header>
    <div class="container-fluid">
      <nav>
        <div class="logo">
          <img :src="getImgUrl(src)" alt="" />
        </div>
        <div class="nav-items">
          <a href="#about">A propos</a>
          <a href="#skills">compétences</a>
          <a href="#realization">réalisations</a>
          <a href="#contact-me">me contacter</a>
          <a href="/blog">blog</a>
        </div>
        <div class="download">
          <downloadCv />
        </div>
        <!-- btn menu -->
        <div class="icon-menu" @click="toggleMenu">
          <svg width="18" height="15" viewBox="0 0 22 17" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 12.0833H21.75V9.66667H0V12.0833ZM0 16.9167H21.75V14.5H0V16.9167ZM0 7.25H21.75V4.83333H0V7.25ZM0 0V2.41667H21.75V0H0Z" fill="currentColor" />
          </svg>
        </div>
      </nav>
    </div>
    <!--=============================== menu for small screen =================================-->
    <div v-if="showMenu" class="menu-container" @click="toggleMenu">
      <div class="menu">
        <div class="icon-close">
          <svg id="img" width="18" height="15" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
            <g>
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </g>
          </svg>
        </div>
          
        <div class="logo-menu">
          <img :src="getImgUrl(src)" alt="" />
        </div>
        <ul class="menu-items">
          <li><a href="#about">A propos</a></li>
          <li><a href="#skills">compétences</a></li>
          <li><a href="#realization">réalisations</a></li>
          <li><a href="#contact-me">me contacter</a></li>
          <li><a href="/blog">blog</a></li>
        </ul>
        <div class="download-btn">
          <!-- <downloadCv /> -->
        </div>
        <div class="separator"><div /></div>
      </div>
    </div>
    <!--========================================================================================-->
  </header>
</template>
<script src="./navbar.js"></script>
<style scoped src="./navbar.css"></style>