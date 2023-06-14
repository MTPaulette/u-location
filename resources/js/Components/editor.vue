<template>
  <!-- <div v-if="editor"> -->
  <div v-if="editor" class="w-full mb-4 border my-border-gray rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
    <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
      <div class="flex flex-wrap items-center justify-between w-full divide-gray-200 sm:divide-x dark:divide-gray-600">
        <div class="flex items-center space-x-1 sm:pr-4">
          <button
            type="button" class="editor-btn"
            :disabled="!editor.can().chain().focus().undo().run()" 
            @click="editor.chain().focus().undo().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
            </svg>
            <span class="sr-only">undo</span>
          </button>

          <!-- redo -->
          <button
            type="button" class="editor-btn"
            :disabled="!editor.can().chain().focus().redo().run()" 
            @click="editor.chain().focus().redo().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4z" />
            </svg>
            <span class="sr-only">redo</span>
          </button>
        </div>

        <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
          <!-- bold -->
          <button
            type="button" class="editor-btn"
            :disabled="!editor.can().chain().focus().toggleBold().run()"
            :class="{ 'is-active': editor.isActive('bold') }"
            @click="editor.chain().focus().toggleBold().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.21 13c2.106 0 3.412-1.087 3.412-2.823 0-1.306-.984-2.283-2.324-2.386v-.055a2.176 2.176 0 0 0 1.852-2.14c0-1.51-1.162-2.46-3.014-2.46H3.843V13H8.21zM5.908 4.674h1.696c.963 0 1.517.451 1.517 1.244 0 .834-.629 1.32-1.73 1.32H5.908V4.673zm0 6.788V8.598h1.73c1.217 0 1.88.492 1.88 1.415 0 .943-.643 1.449-1.832 1.449H5.907z" />
            </svg>
            <span class="sr-only">bold</span>
          </button>

          <!-- italic -->
          <button
            type="button" class="editor-btn" 
            :disabled="!editor.can().chain().focus().toggleItalic().run()" 
            :class="{ 'is-active': editor.isActive('italic') }" 
            @click="editor.chain().focus().toggleItalic().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M7.991 11.674 9.53 4.455c.123-.595.246-.71 1.347-.807l.11-.52H7.211l-.11.52c1.06.096 1.128.212 1.005.807L6.57 11.674c-.123.595-.246.71-1.346.806l-.11.52h3.774l.11-.52c-1.06-.095-1.129-.211-1.006-.806z" />
            </svg>
            <span class="sr-only">italic</span>
          </button>

          <!-- underline -->
          
          <button
            type="button" class="editor-btn" 
            :class="{ 'is-active': editor.isActive('underline') }" @click="editor.chain().focus().toggleUnderline().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.313 3.136h-1.23V9.54c0 2.105 1.47 3.623 3.917 3.623s3.917-1.518 3.917-3.623V3.136h-1.23v6.323c0 1.49-.978 2.57-2.687 2.57-1.709 0-2.687-1.08-2.687-2.57V3.136zM12.5 15h-9v-1h9v1z" />
            </svg>
            <span class="sr-only">underline</span>
          </button>

          <!-- strike -->
          <button
            type="button" class="editor-btn"
            :disabled="!editor.can().chain().focus().toggleStrike().run()"
            :class="{ 'is-active': editor.isActive('strike') }"
            @click="editor.chain().focus().toggleStrike().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.333 5.686c0 .31.083.581.27.814H5.166a2.776 2.776 0 0 1-.099-.76c0-1.627 1.436-2.768 3.48-2.768 1.969 0 3.39 1.175 3.445 2.85h-1.23c-.11-1.08-.964-1.743-2.25-1.743-1.23 0-2.18.602-2.18 1.607zm2.194 7.478c-2.153 0-3.589-1.107-3.705-2.81h1.23c.144 1.06 1.129 1.703 2.544 1.703 1.34 0 2.31-.705 2.31-1.675 0-.827-.547-1.374-1.914-1.675L8.046 8.5H1v-1h14v1h-3.504c.468.437.675.994.675 1.697 0 1.826-1.436 2.967-3.644 2.967z" />
            </svg>
            <span class="sr-only">strike</span>
          </button>
          
          <!-- type: h1, h2, h3, h4, h5, h6 -->
          <div class="relative">
            <div v-show="type" class="absolute z-50 bottom-10 bg-white divide-y divide-gray-100 shadow-lg text-center w-[50px] h-auto dark:bg-gray-700">
              <ul class="max-h-[150px] over-y text-sm text-gray-700 dark:text-gray-200">
                <li class="editor-dropitem my-border-gray" @click="type=false">
                  <span :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()">
                    h1
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray" @click="type=false">
                  <span :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }" @click="editor.chain().focus().toggleHeading({ level: 2 }).run()">
                    h2
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray" @click="type=false">
                  <span :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }" @click="editor.chain().focus().toggleHeading({ level: 3 }).run()">
                    h3
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray" @click="type=false">
                  <span :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }" @click="editor.chain().focus().toggleHeading({ level: 4 }).run()">
                    h4
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray" @click="type=false">
                  <span :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }" @click="editor.chain().focus().toggleHeading({ level: 5 }).run()">
                    h5
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray" @click="type=false">
                  <span :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }" @click="editor.chain().focus().toggleHeading({ level: 6 }).run()">
                    h6
                  </span>
                </li>
              </ul>
            </div>
            <button type="button" class="editor-btn" @click="type=!type">
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> 
                <path d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z" />
              </svg>
              <span class="sr-only">text type</span>
            </button>
          </div>
          
          <!-- palette color -->
          <div class="relative">
            <div v-show="palette" class="absolute z-50 bottom-12 bg-white divide-y divide-gray-100 shadow-lg w-[80px] h-auto text-center dark:bg-gray-700">
              <ul class="max-h-[150px] over-y text-sm text-gray-700 dark:text-gray-200">
                <li class="editor-dropitem my-border-gray hover:text-white hover:bg-mango" @click="palette=false">
                  <span :class="{ 'is-active': editor.isActive('textStyle', { color: '#f7941d' })}" @click="editor.chain().focus().setColor('#f7941d').run()">
                    mango
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray hover:text-white hover:bg-onion-100" @click="palette=false">
                  <span :class="{ 'is-active': editor.isActive('textStyle', { color: '#890352' })}" @click="editor.chain().focus().setColor('#890352').run()">
                    onion 100
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray hover:text-white hover:bg-onion-200" @click="palette=false">
                  <span :class="{ 'is-active': editor.isActive('textStyle', { color: '#580389' })}" @click="editor.chain().focus().setColor('#580389').run()">
                    onion 200
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray hover:text-white hover:bg-pineapple" @click="palette=false">
                  <span :class="{ 'is-active': editor.isActive('textStyle', { color: '#fcea4b' })}" @click="editor.chain().focus().setColor('#fcea4b').run()">
                    pineapple
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray hover:text-white hover:bg-sheet-50" @click="palette=false">
                  <span :class="{ 'is-active': editor.isActive('textStyle', { color: '#61a60e' })}" @click="editor.chain().focus().setColor('#61a60e').run()">
                    sheet 50
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray hover:text-white hover:bg-sheet-100" @click="palette=false">
                  <span :class="{ 'is-active': editor.isActive('textStyle', { color: '#047634' })}" @click="editor.chain().focus().setColor('#047634').run()">
                    sheet 100
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray hover:text-white hover:bg-sheet-200" @click="palette=false">
                  <span :class="{ 'is-active': editor.isActive('textStyle', { color: '#036b2f' })}" @click="editor.chain().focus().setColor('#036b2f').run()">
                    sheet 200
                  </span>
                </li>

                <li class="editor-dropitem my-border-gray" @click="palette=false">
                  <span @click="editor.chain().focus().unsetColor().run()">
                    unsetColor
                  </span>
                </li>
              </ul>
            </div>
            <div class="editor-btn mt-3.5">
              <button type="button" @click="palette=!palette">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                  <path d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8zm-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7z" />
                </svg>
                <span class="sr-only">color</span>
              </button>
              <div class="-ml-1.5 -mt-5">
                <input
                  type="color" class="w-7 h-3"
                  :value="editor.getAttributes('textStyle').color"
                  @input="editor.chain().focus().setColor($event.target.value).run()"
                />
              </div>
            </div>
          </div>
          <!-- paragraph -->
          <button
            type="button" class="editor-btn" 
            :class="{ 'is-active': editor.isActive('paragraph') }" 
            @click="editor.chain().focus().setParagraph().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> 
              <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
            </svg>
            <span class="sr-only">paragraph</span>
          </button>

          <!-- unordered list -->
          <button
            type="button" class="editor-btn" 
            :class="{ 'is-active': editor.isActive('bulletList') }" 
            @click="editor.chain().focus().toggleBulletList().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
            </svg>
            <span class="sr-only">unordered list</span>
          </button>

          <!-- ordered list -->
          <button
            type="button" class="editor-btn" 
            :class="{ 'is-active': editor.isActive('orderedList') }" 
            @click="editor.chain().focus().toggleOrderedList().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
              <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
            </svg>
            <span class="sr-only">ordered list</span>
          </button>
        </div>



        <div class="flex flex-wrap items-center space-x-1 sm:pl-4">
          <!-- <button
            type="button" class="editor-btn" 
            :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }" 
            @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> 
              <path d="M8.637 13V3.669H7.379V7.62H2.758V3.67H1.5V13h1.258V8.728h4.62V13h1.259zm5.329 0V3.669h-1.244L10.5 5.316v1.265l2.16-1.565h.062V13h1.244z" />
            </svg>
            <span class="sr-only">h1</span>
          </button> -->
          
          <!-- horizontal line -->
          <button
            type="button" class="editor-btn" 
            @click="editor.chain().focus().setHorizontalRule().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 3H4a1 1 0 0 0-1 1v2.5H2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2.5h-1V4a1 1 0 0 0-1-1zM2 9.5h1V12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V9.5h1V12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.5zm-1.5-2a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z" />
            </svg>
            <span class="sr-only">horizontal line</span>
          </button>

          <!-- blockquote -->
          <button
            type="button" class="editor-btn" 
            :class="{ 'is-active': editor.isActive('blockquote') }" 
            @click="editor.chain().focus().toggleBlockquote().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm5 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm-5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm.79-5.373c.112-.078.26-.17.444-.275L3.524 6c-.122.074-.272.17-.452.287-.18.117-.35.26-.51.428a2.425 2.425 0 0 0-.398.562c-.11.207-.164.438-.164.692 0 .36.072.65.217.873.144.219.385.328.72.328.215 0 .383-.07.504-.211a.697.697 0 0 0 .188-.463c0-.23-.07-.404-.211-.521-.137-.121-.326-.182-.568-.182h-.282c.024-.203.065-.37.123-.498a1.38 1.38 0 0 1 .252-.37 1.94 1.94 0 0 1 .346-.298zm2.167 0c.113-.078.262-.17.445-.275L5.692 6c-.122.074-.272.17-.452.287-.18.117-.35.26-.51.428a2.425 2.425 0 0 0-.398.562c-.11.207-.164.438-.164.692 0 .36.072.65.217.873.144.219.385.328.72.328.215 0 .383-.07.504-.211a.697.697 0 0 0 .188-.463c0-.23-.07-.404-.211-.521-.137-.121-.326-.182-.568-.182h-.282a1.75 1.75 0 0 1 .118-.492c.058-.13.144-.254.257-.375a1.94 1.94 0 0 1 .346-.3z" />
            </svg>
            <span class="sr-only">blockquote</span>
          </button>
          
          <!-- format code -->
          <button
            type="button" class="editor-btn" 
            :disabled="!editor.can().chain().focus().toggleCode().run()" 
            :class="{ 'is-active': editor.isActive('code') }" 
            @click="editor.chain().focus().toggleCode().run()"
          >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z" />
            </svg>
            <span class="sr-only">Format code</span>
          </button>
          
          <!-- more tools -->
          <div class="relative">
            <div v-show="tools" class="absolute z-50 bottom-10 bg-white divide-y divide-gray-100 shadow-lg w-[100px] h-auto dark:bg-gray-700">
              <ul class="text-sm text-gray-700 dark:text-gray-200">
                <li class="editor-dropitem my-border-gray" @click="tools=false">
                  <span @click="editor.chain().focus().unsetAllMarks().run()">
                    clear marks
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray" @click="tools=false">
                  <span @click="editor.chain().focus().clearNodes().run()">
                    clear nodes
                  </span>
                </li>
                <li class="editor-dropitem my-border-gray" @click="tools=false">
                  <span @click="editor.chain().focus().setHardBreak().run()">
                    hard break
                  </span>
                </li>
              </ul>
            </div>
            <button type="button" class="editor-btn" @click="tools=!tools">
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg>
              <span class="sr-only">more tool</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
      <label for="description" class="sr-only">Publish post</label>
      <div class="z-50">
        <editor-content :editor="editor" />
      </div>
    </div>
  </div>
</template>

<script>
import StarterKit from '@tiptap/starter-kit'
import { Editor, EditorContent } from '@tiptap/vue-3'
import { Color } from '@tiptap/extension-color'
import TextStyle from '@tiptap/extension-text-style'
import Underline from '@tiptap/extension-underline'


export default {
  components: {
    EditorContent,
  },

  props: {
    modelValue: {
      type: String,
      default: '',
    },
  },

  emits: ['update:modelValue'],

  data() {
    return {
      editor: null,
      tools: false,
      palette: false,
      type: false,
    }
  },

  watch: {
    modelValue(value) {
      // HTML
      const isSame = this.editor.getHTML() === value

      // JSON
      // const isSame = JSON.stringify(this.editor.getJSON()) === JSON.stringify(value)

      if (isSame) {
        return
      }

      this.editor.commands.setContent(value, false)
    },
  },
  
  mounted() {
    this.editor = new Editor({
      extensions: [
        StarterKit,
        TextStyle,
        Color,
        Underline,
      ],
      content: this.modelValue,
      onUpdate: () => {
        // HTML
        this.$emit('update:modelValue', this.editor.getHTML())

        // JSON
        // this.$emit('update:modelValue', this.editor.getJSON())
      },
      editorProps: {
        attributes: {
          class: 'prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto focus:outline-none min-h-[150px] h-auto block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400',
        },
      },
    })
  },

  beforeUnmount() {
    this.editor.destroy()
  },
}
</script>

<style lang="scss">
/* Basic editor styles */
.ProseMirror {
  > * + * {
    margin-top: 0.75em;
  }

  ul,
  ol {
    padding: 0 1rem;
  }

  ol {
    list-style: disc;
  }

  h1, h2, h3, h4, h5, h6 {
    display: block;
    margin-left: 0;
    margin-right: 0;
    font-weight: bold;
  }

  h1 {
    font-size: 2em;
    margin-top: 0.67em;
    margin-bottom: 0.67em;
  }

  h2 {
    font-size: 1.5em;
    margin-top: 0.83em;
    margin-bottom: 0.83em;
  }

  h3 {
    font-size: 1.17em;
    margin-top: 1em;
    margin-bottom: 1em;
  }

  h4 {
    font-size: 1em;
    margin-top: 1.33em;
    margin-bottom: 1.33em;
  }

  h5 {
    font-size: 0.83em;
    margin-top: 1.67em;
    margin-bottom: 1.67em;
  }

  h6 {
    font-size: 0.67em;
    margin-top: 2.33em;
    margin-bottom: 2.33em;
  }

  code {
    background-color: rgba(#616161, 0.1);
    color: #616161;
  }

  pre {
    background: #0D0D0D;
    color: #FFF;
    font-family: 'JetBrainsMono', monospace;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;

    code {
      color: inherit;
      padding: 0;
      background: none;
      font-size: 0.8rem;
    }
  }

  img {
    max-width: 100%;
    height: auto;
  }

  blockquote {
    padding-left: 1rem;
    border-left: 2px solid rgba(#0D0D0D, 0.1);
  }

  hr {
    border: none;
    border-top: 2px solid rgba(#0D0D0D, 0.1);
    margin: 2rem 0;
  }
}
</style>
