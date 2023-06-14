<template>
  <slot />
</template>

<style>
.over-y {
  overflow-y: scroll;
}

.over-y::-webkit-scrollbar{
  width: 2px;
}

.over-y::-webkit-scrollbar-track{
  box-shadow: inset 0 0 6px #FFF;
}

.over-y::-webkit-scrollbar-thumb{
  outline: 1px solid #C4C4C4;
  background: #C4C4C4;
  border-radius: 8px;
}
</style>