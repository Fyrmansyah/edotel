<template>
    <div class="relative bg-[#f1f1f1] p-[80px_0] lg:p-[120px_0]" id="facilities">
        <div class="absolute right-0 top-0 hidden lg:block">
            <img :src="'/client/assets/images/about/section__shape_2.svg'" alt="" />
        </div>
        <div class="container">
            <div class="mb-[40px] text-center">
                <span class="subtitle font-glida heading-6 heading text-primary">Facilities</span>
                <h2 class="text-heading mt-[15px]">Hotel Facilities</h2>
            </div>
            <div class="grid grid-cols-1 gap-[25px] md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <img
                        class="mx-auto mb-[25px]"
                        :src="'/client/assets/images/icon/bed.svg'"
                        alt="icon"
                    />
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#"
                        >Rooms and Suites</a
                    >
                    <p>
                        Kamar yang nyaman, bersih, dan ber-AC dengan kasur empuk untuk tidur lebih
                        nyenyak.
                    </p>
                </div>
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <img
                        class="mx-auto mb-[25px]"
                        :src="'/client/assets/images/icon/security.svg'"
                        alt="icon"
                    />
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#"
                        >24-Hour Security</a
                    >
                    <p>
                        Keamanan terjaga 24 jam penuh dengan sistem pengawasan modern dan staf
                        profesional.
                    </p>
                </div>
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <svg
                        viewBox="0 0 64 64"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="#ab8a62"
                        height="52px"
                        width="52px"
                        class="mx-auto mb-[25px]"
                    >
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                            id="SVGRepo_tracerCarrier"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        ></g>
                        <g
                            id="SVGRepo_iconCarrier"
                            style="
                                fill: none;
                                stroke: #ab8a62;
                                stroke-linejoin: round;
                                stroke-width: 2px;
                            "
                        >
                            <title></title>
                            <g data-name="Layer 19" id="Layer_19">
                                <rect class="cls-1" height="4" width="60" x="2" y="58"></rect>
                                <line class="cls-1" x1="60" x2="60" y1="25" y2="58"></line>
                                <line class="cls-1" x1="4" x2="4" y1="58" y2="25"></line>
                                <path
                                    class="cls-1"
                                    d="M2,12H12a0,0,0,0,1,0,0v9a5,5,0,0,1-5,5H7a5,5,0,0,1-5-5V12A0,0,0,0,1,2,12Z"
                                ></path>
                                <path
                                    class="cls-1"
                                    d="M22,17.59V21a5,5,0,0,1-5,5h0a5,5,0,0,1-5-5V12h9.05"
                                ></path>
                                <path
                                    class="cls-1"
                                    d="M31,24a5,5,0,0,1-4,2h0a5,5,0,0,1-5-5V17.59"
                                ></path>
                                <path
                                    class="cls-1"
                                    d="M42,17.59V21a5,5,0,0,1-5,5h0a5,5,0,0,1-4-2"
                                ></path>
                                <path
                                    class="cls-1"
                                    d="M43,12h9v9a5,5,0,0,1-5,5h0a5,5,0,0,1-5-5V17.59"
                                ></path>
                                <path
                                    class="cls-1"
                                    d="M52,12H62a0,0,0,0,1,0,0v9a5,5,0,0,1-5,5h0a5,5,0,0,1-5-5V12A0,0,0,0,1,52,12Z"
                                ></path>
                                <circle class="cls-1" cx="32" cy="13" r="11"></circle>
                                <path
                                    class="cls-1"
                                    d="M27,8h8a0,0,0,0,1,0,0v8a2,2,0,0,1-2,2H29a2,2,0,0,1-2-2V8A0,0,0,0,1,27,8Z"
                                ></path>
                                <path
                                    class="cls-1"
                                    d="M35,10h1a3,3,0,0,1,3,3h0a3,3,0,0,1-3,3H35"
                                ></path>
                                <rect class="cls-1" height="22" width="28" x="8" y="30"></rect>
                                <polyline class="cls-1" points="42 58 42 38 56 38 56 58"></polyline>
                                <line class="cls-1" x1="8" x2="36" y1="46" y2="46"></line>
                                <line class="cls-1" x1="12" x2="18" y1="41" y2="35"></line>
                                <line class="cls-1" x1="19" x2="25" y1="41" y2="35"></line>
                                <line class="cls-1" x1="26" x2="32" y1="41" y2="35"></line>
                                <line class="cls-1" x1="46" x2="46" y1="45" y2="51"></line>
                                <rect class="cls-1" height="4" width="10" x="44" y="30"></rect>
                            </g>
                        </g>
                    </svg>
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#">Caffe</a>
                    <p>
                        Nikmati aneka menu makanan dan minuman lezat dengan harga terjangkau di café
                        kami.
                    </p>
                </div>
                <div class="rounded-[10px] bg-white px-[30px] py-[40px] text-center transition">
                    <svg
                        fill="#ab8a62"
                        version="1.1"
                        id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 473.631 473.631"
                        xml:space="preserve"
                        stroke="#ab8a62"
                        stroke-width="3.5"
                        height="52px"
                        width="52px"
                        class="mx-auto mb-[25px]"
                    >
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                            id="SVGRepo_tracerCarrier"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        ></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path
                                        d="M102.528,78.645h31.229c7.574,0,13.735-6.162,13.735-13.735V52.535c0-7.574-6.162-13.735-13.735-13.735h-31.229 c-7.574,0-13.735,6.162-13.735,13.735V64.91C88.793,72.484,94.955,78.645,102.528,78.645z M100.793,52.535 c0-0.94,0.795-1.735,1.735-1.735h31.229c0.94,0,1.735,0.795,1.735,1.735V64.91c0,0.94-0.795,1.735-1.735,1.735h-31.229 c-0.94,0-1.735-0.795-1.735-1.735V52.535z"
                                    ></path>
                                    <path
                                        d="M294.218,81.245c12.418,0,22.52-10.104,22.52-22.522c0-12.419-10.102-22.522-22.52-22.522 c-12.42,0-22.524,10.104-22.524,22.522S281.798,81.245,294.218,81.245z M294.218,48.201c5.801,0,10.52,4.72,10.52,10.522 s-4.719,10.522-10.52,10.522c-5.803,0-10.524-4.72-10.524-10.522S288.415,48.201,294.218,48.201z"
                                    ></path>
                                    <path
                                        d="M362.325,81.245c12.414,0,22.514-10.104,22.514-22.522c0-12.419-10.1-22.522-22.514-22.522 c-12.424,0-22.529,10.104-22.529,22.522S349.901,81.245,362.325,81.245z M362.325,48.201c5.797,0,10.514,4.72,10.514,10.522 s-4.717,10.522-10.514,10.522c-5.807,0-10.529-4.72-10.529-10.522S356.519,48.201,362.325,48.201z"
                                    ></path>
                                    <path
                                        d="M400.933,0H72.698C48.177,0,28.229,19.949,28.229,44.469v384.693c0,24.521,19.949,44.469,44.469,44.469h328.234 c24.521,0,44.469-19.949,44.469-44.469V44.47C445.401,19.949,425.454,0,400.933,0z M72.698,12h328.234 c17.904,0,32.469,14.565,32.469,32.469v57.475H40.229V44.47C40.229,26.566,54.794,12,72.698,12z M400.933,461.631H72.698 c-17.904,0-32.469-14.564-32.469-32.469V113.944h393.174v315.218C433.401,447.066,418.837,461.631,400.933,461.631z"
                                    ></path>
                                    <path
                                        d="M354.7,252.698c-11.447-54.579-59.953-95.691-117.885-95.691c-66.415,0-120.448,54.032-120.448,120.446 c0,11.833,1.724,23.271,4.919,34.082c0.017,0.061,0.035,0.122,0.054,0.182c14.796,49.775,60.959,86.182,115.475,86.182 c66.414,0,120.447-54.031,120.447-120.445c0-8.197-0.826-16.204-2.395-23.945C354.829,253.232,354.776,252.961,354.7,252.698z M236.816,169.007c49.462,0,91.294,33.285,104.278,78.629c-2.449-0.147-4.824-0.228-7.143-0.228 c-36.729,0-59.564,18.269-81.648,35.937c-21.41,17.129-41.635,33.309-74.155,33.309c-12.567,0-28.069-3.76-46.096-11.159 c-2.398-8.948-3.684-18.349-3.684-28.043C128.368,217.655,177.018,169.007,236.816,169.007z M236.816,385.898 c-44.577,0-82.952-27.036-99.604-65.57c15.473,5.523,29.206,8.326,40.936,8.326c36.729,0,59.567-18.27,81.653-35.938 c21.41-17.129,41.633-33.308,74.15-33.308c3.137,0,6.404,0.159,9.879,0.468c0.938,5.723,1.432,11.592,1.432,17.575 C345.263,337.25,296.614,385.898,236.816,385.898z"
                                    ></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <a class="heading-6 heading text-heading mb-[15px] block" href="#">Laundry</a>
                    <p>
                        Layanan laundry cepat dan bersih, membuat pakaian selalu wangi dan nyaman
                        dipakai.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
