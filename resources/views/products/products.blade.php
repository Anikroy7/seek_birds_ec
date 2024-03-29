  <!-- ✅ Grid Section - Starts Here 👇 -->
  <section id="products"
      class="px-8 grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-10 gap-x-6 mt-10 mb-5">

      <!--   ✅ Product card 1 - Starts Here 👇 -->
      @foreach ($data as $item)
          <div
              class="w-72 bg-white shadow-md rounded-xl duration-300 hover:scale-100 hover:shadow-xl hover:bg-slate-100 z-10">

              <div>
                  <img src="{{ $item->image_url }}" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                  <div class="px-4 py-3 w-72">
                      <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                      <p class="text-lg font-bold text-black truncate block capitalize">{{ $item->title }}</p>
                      <div class="flex items-center">
                          <p class="text-lg font-semibold text-black cursor-auto my-3"><span class="text-2xl font-bold">৳</span> {{ $item->current_price }}</p>
                          <del>
                              <p class="text-sm text-gray-600 cursor-auto ml-2"><span class="text-2xl font-bold">৳</span> {{ $item->previous_price }}</p>
                          </del>
                          <div class="ml-auto flex items-center justify-center gap-3">
                              <a href="{{ route('product.details', ['id' => $item->id]) }}">
                                  <svg class="mt-1 hover:text-orange-500 hover:cursor-pointer"
                                      xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                      fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                      <title>Details</title>

                                      <path
                                          d="M1.805 7a9.11 9.11 0 0 1 13.06 0A5.11 5.11 0 0 1 8 12.5 5.11 5.11 0 0 1 1.805 7zM8 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                      <path fill-rule="evenodd"
                                          d="M0 7s3.5-4 8-4c4.5 0 8 4 8 4s-3.5 4-8 4C3.5 11 0 7 0 7zm1 0s3-3 7-3 7 3 7 3-3 3-7 3-7-3-7-3z" />
                                  </svg>
                              </a>
                              <button onclick="cartOperation(event, '{{ $item->id }}', '+')" class="hover:text-orange-500 hover:cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <title>Buy Now</title>
                                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                            </button>
                            
                                  {{-- <button class="rounded-lg px-3 py-1 bg-orange-500 text-gray-100 hover:bg-gray-700 duration-300">Buy now</button>    --}}
                               {{--  <button class="flex items-center rounded-lg px-3 py-1 bg-orange-500 text-gray-100 hover:bg-orange-700 duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus mr-2" viewBox="0 0 16 16">
                                        <title>Buy Now</title>
                                        <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                    </svg>
                                    Buy now
                                </button> --}}
                                
                            
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
      <!--   🛑 Product card 1 - Ends Here  -->

      <!--   ✅ Product card 2 - Starts Here 👇 -->
      <div class="w-72 bg-white shadow-md rounded-xl hover:scale-100  hover:bg-slate-100 hover:shadow-xl">
          <a href="#">
              <img src="https://images.unsplash.com/photo-1651950519238-15835722f8bb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8Mjh8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                  alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="px-4 py-3 w-72">
                  <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                  <p class="text-lg font-bold text-black truncate block capitalize">Product Name</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                      <del>
                          <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                      </del>
                      <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                              fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                  d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path
                                  d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg></div>
                  </div>
              </div>
          </a>
      </div>
      <!--   🛑 Product card 2- Ends Here  -->

      <!--   ✅ Product card 3 - Starts Here 👇 -->
      <div class="w-72 bg-white shadow-md rounded-xl hover:scale-100  hover:bg-slate-100 hover:shadow-xl">
          <a href="#">
              <img src="https://images.unsplash.com/photo-1651950537598-373e4358d320?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8MjV8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                  alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="px-4 py-3 w-72">
                  <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                  <p class="text-lg font-bold text-black truncate block capitalize">Product Name</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                      <del>
                          <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                      </del>
                      <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                              fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                  d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path
                                  d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg></div>
                  </div>
              </div>
          </a>
      </div>
      <!--   🛑 Product card 3 - Ends Here  -->

      <!--   ✅ Product card 4 - Starts Here 👇 -->
      <div class="w-72 bg-white shadow-md rounded-xl hover:scale-100  hover:bg-slate-100 hover:shadow-xl">
          <a href="#">
              <img src="https://images.unsplash.com/photo-1651950540805-b7c71869e689?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8Mjl8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                  alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="px-4 py-3 w-72">
                  <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                  <p class="text-lg font-bold text-black truncate block capitalize">Product Name</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                      <del>
                          <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                      </del>
                      <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                              fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                  d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path
                                  d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg></div>
                  </div>
              </div>
          </a>
      </div>
      <!--   🛑 Product card 4 - Ends Here  -->

      <!--   ✅ Product card 5 - Starts Here 👇 -->
      <div class="w-72 bg-white shadow-md rounded-xl hover:scale-100  hover:bg-slate-100 hover:shadow-xl">
          <a href="#">
              <img src="https://images.unsplash.com/photo-1649261191624-ca9f79ca3fc6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                  alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="px-4 py-3 w-72">
                  <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                  <p class="text-lg font-bold text-black truncate block capitalize">Product Name</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                      <del>
                          <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                      </del>
                      <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                              fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                  d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path
                                  d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg></div>
                  </div>
              </div>
          </a>
      </div>
      <!--   🛑 Product card 5 - Ends Here  -->

      <!--   ✅ Product card 6 - Starts Here 👇 -->
      <div class="w-72 bg-white shadow-md rounded-xl hover:scale-100  hover:bg-slate-100 hover:shadow-xl">
          <a href="#">
              <img src="https://images.unsplash.com/photo-1649261191606-cb2496e97eee?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NDR8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                  alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="px-4 py-3 w-72">
                  <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                  <p class="text-lg font-bold text-black truncate block capitalize">Product Name</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                      <del>
                          <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                      </del>
                      <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                              fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                  d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path
                                  d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg></div>
                  </div>
              </div>
          </a>
      </div>
  </section>

