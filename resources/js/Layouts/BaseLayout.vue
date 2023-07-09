<template>
  <slot />
</template>

<style>
.over-x {
  overflow-x: scroll;
}
.over-y {
  overflow-y: scroll;
}

.over-x::-webkit-scrollbar{
  height: 2px;
}

.over-y::-webkit-scrollbar{
  width: 2px;
}

.over-x::-webkit-scrollbar-track,
.over-y::-webkit-scrollbar-track{
  /* box-shadow: inset 0 0 6px #9e9e9e; */
  box-shadow: inset 0 0 6px #FFF;
}

.over-x::-webkit-scrollbar-thumb,
.over-y::-webkit-scrollbar-thumb{
  outline: 1px solid #C4C4C4;
  background: #C4C4C4;
  /* outline: 1px solid #61a60e;
  background: #61a60e; */
  border-radius: 8px;
}

.content ol {
  padding: 0 2rem;
  list-style: decimal;
}

.content ul {
  padding: 0 1rem;
}

.content ul li {
  list-style: none;
  padding: 1px 17px;
  background-image: url("./../../images/feuille-50.png");
  background-repeat: no-repeat;
  background-position: 0px 10px;
  background-size: 12px;
}
</style>