import React from 'react'

function Card() {
  return (
    <div>
        <>
  {/* Browsers Card */}
  <div className="h-full flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
    {/* Header */}
    <div className="p-5 pb-3 flex justify-between items-center">
      <h2 className="ms-1 inline-block font-semibold text-gray-800 dark:text-neutral-200">
        Browsers
      </h2>
      <span className="py-1 ps-1.5 pe-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full bg-white border border-gray-200 text-gray-800 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200">
        <svg
          className="flex-shrink-0 w-3 h-3"
          width={16}
          height={16}
          viewBox="0 0 16 16"
          fill="currentColor"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        Good
      </span>
    </div>
    {/* End Header */}
    {/* Body */}
    <div className="flex flex-col justify-between h-full pb-5 px-5">
      <div>
        <h4 className="text-5xl md:text-6xl font-medium text-blue-600 dark:text-blue-500">
          <span className="bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500 text-transparent">
            85%
          </span>
        </h4>
        <p className="mt-5 text-gray-500 dark:text-neutral-500">
          Visitors are viewing website from the desktop device. 57% of all users
          are using MacOS
        </p>
      </div>
      {/* Stats */}
      <div className="mt-5">
        {/* Grid */}
        <div className="grid grid-cols-3 gap-3">
          {/* Card */}
          <div className="p-3 bg-gray-100 rounded-lg dark:bg-neutral-700">
            <img
              className="flex-shrink-0 w-6 h-6 mb-4"
              src="../../assets/svg/brands/chrome.svg"
              alt="Chrome Logo"
            />
            <p className="text-sm text-gray-800 dark:text-neutral-200">
              Chrome
            </p>
            <p className="font-semibold text-lg text-gray-800 dark:text-neutral-200">
              56%
            </p>
          </div>
          {/* End Card */}
          {/* Card */}
          <div className="p-3 bg-gray-100 rounded-lg dark:bg-neutral-700">
            <img
              className="flex-shrink-0 w-6 h-6 mb-4"
              src="../../assets/svg/brands/firefox.svg"
              alt="Firefox Logo"
            />
            <p className="text-sm text-gray-800 dark:text-neutral-200">
              Firefox
            </p>
            <p className="font-semibold text-lg text-gray-800 dark:text-neutral-200">
              24%
            </p>
          </div>
          {/* End Card */}
          {/* Card */}
          <div className="p-3 bg-gray-100 rounded-lg dark:bg-neutral-700">
            <img
              className="flex-shrink-0 w-6 h-6 mb-4"
              src="../../assets/svg/brands/safari.svg"
              alt="Safari Logo"
            />
            <p className="text-sm text-gray-800 dark:text-neutral-200">
              Safari
            </p>
            <p className="font-semibold text-lg text-gray-800 dark:text-neutral-200">
              17%
            </p>
          </div>
          {/* End Card */}
        </div>
        {/* End Grid */}
      </div>
      {/* End Stats */}
      {/* Alert */}
      <div
        className="mt-5 border border-gray-200 rounded-xl shadow-sm py-2 px-3 dark:border-neutral-700"
        role="alert"
      >
        <div className="flex gap-x-3">
          <svg
            className="mt-1 flex-shrink-0 w-5 h-5 text-gray-800 dark:text-neutral-200"
            xmlns="http://www.w3.org/2000/svg"
            width={24}
            height={24}
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth={2}
            strokeLinecap="round"
            strokeLinejoin="round"
          >
            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
          </svg>
          <div className="grow">
            <h3 className="text-sm text-gray-800 font-semibold dark:text-white">
              Push notifications
            </h3>
            <p className="text-sm text-gray-700 dark:text-neutral-400">
              Automatically send me notifications
            </p>
          </div>
          {/* Switch/Toggle */}
          <div className="flex justify-between items-center">
            <label htmlFor="hs-pro-dbcpns" className="sr-only">
              On
            </label>
            <div className="relative inline-block">
              <input
                type="checkbox"
                id="hs-pro-dbcpns"
                className="relative w-11 h-6 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-neutral-900

      before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-white before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-white"
                defaultChecked=""
              />
            </div>
          </div>
          {/* End Switch/Toggle */}
        </div>
      </div>
      {/* End Alert */}
    </div>
    {/* End Body */}
  </div>
  {/* End Browsers Card */}
</>

    </div>
  )
}

export default Card
