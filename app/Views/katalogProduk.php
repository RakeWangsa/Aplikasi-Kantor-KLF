<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Katalog Produk</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url('assets2/style.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body>


<!-- partial:index.partial.html -->
<div class="app-container">
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="app-icon">
      <img src="<?= base_url('assets2/klf-logo.png') ?>" alt="Logo" width="320px" height="100px" style="margin-left:-73px">
      </div>
      
    </div>
    <ul class="sidebar-list">
      <li class="sidebar-list-item">
        <a href="<?= base_url('dashboard'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dashboard">
    <rect x="3" y="3" width="6" height="6" />
    <rect x="15" y="3" width="6" height="6" />
    <rect x="3" y="15" width="6" height="6" />
    <rect x="15" y="15" width="6" height="6" />
</svg>

          <span>Dashboard</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="<?= base_url('order/listOrder'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list-order">
    <line x1="5" y1="6" x2="19" y2="6" />
    <line x1="5" y1="12" x2="19" y2="12" />
    <line x1="5" y1="18" x2="19" y2="18" />
</svg>


          <span>List Order</span>
        </a>
      </li>

      <li class="sidebar-list-item">
        <a href="<?= base_url('taskCalendar'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-task-calendar">
    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
    <line x1="16" y1="2" x2="16" y2="6" />
    <line x1="8" y1="2" x2="8" y2="6" />
    <line x1="3" y1="10" x2="21" y2="10" />
    <line x1="3" y1="14" x2="21" y2="14" />
</svg>

          <span>Task Calendar</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-supplier">
    <rect x="3" y="8" width="18" height="12" rx="2" ry="2" />
    <rect x="8" y="6" width="8" height="4" rx="1" ry="1" />
    <path d="M12 16v3m-2-3v3m4-3v3" />
</svg>

          <span>Supplier</span>
        </a>
      </li>
      <li class="sidebar-list-item active">
        <a href="<?= base_url('katalogProduk'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-product-catalog">
    <rect x="2" y="3" width="20" height="18" rx="2" ry="2" />
    <line x1="9" y1="7" x2="15" y2="7" />
    <line x1="9" y1="11" x2="15" y2="11" />
    <line x1="9" y1="15" x2="13" y2="15" />
</svg>




          <span>Katalog Produk</span>
        </a>
      </li>
    </ul>
    <div class="account-info">
      <div class="account-info-picture">
        <img src="https://images.unsplash.com/photo-1527736947477-2790e28f3443?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTE2fHx3b21hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="Account">
      </div>
      <div class="account-info-name"><?= session()->get('name') ?></div>
      <a class="account-info-more" href="<?= base_url('logout'); ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
        <path d="M19 12H5M12 19l7-7-7-7"/>
    </svg>
                  </a>
    </div>
  </div>
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Katalog Produk</h1>
      <button class="app-content-headerButton">Add Product</button>
    </div>
    <div class="app-content-actions">
      <input class="search-bar" placeholder="Search..." type="text">
      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>Category</label>
            <select>
              <option>All Categories</option>
              <option>Furniture</option>                     <option>Decoration</option>
              <option>Kitchen</option>
              <option>Bathroom</option>
            </select>
            <label>Status</label>
            <select>
              <option>All Status</option>
              <option>Active</option>
              <option>Disabled</option>
            </select>
            <div class="filter-menu-buttons">
              <button class="filter-button reset">
                Reset
              </button>
              <button class="filter-button apply">
                Apply
              </button>
            </div>
          </div>
        </div>
        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell image">
          Items
          <button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button>
        </div>
        <div class="product-cell category">Category<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
        <div class="product-cell status-cell">Status<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
        <div class="product-cell sales">Sales<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
        <div class="product-cell stock">Stock<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
        <div class="product-cell price">Price<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="product">
            <span>Ocean</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active">Active</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>11</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>36</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$560</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8a2l0Y2hlbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Lou</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Kitchen</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status disabled">Disabled</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>6</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>46</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$710</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDR8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Yellow</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Decoration</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active">Active</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>61</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>56</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$360</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YmVkcm9vbXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Dreamy</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Bedroom</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status disabled">Disabled</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>41</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>66</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$260</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8aW50ZXJpb3J8ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Boheme</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active">Active</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>32</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>40</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$350</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1507652313519-d4e9174996dd?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Sky</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Bathroom</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status disabled">Disabled</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>22</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>44</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$160</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzB8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Midnight</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active">Active</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>23</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>45</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$340</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8aW50ZXJpb3J8ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Boheme</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active">Active</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>32</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>40</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$350</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1511389026070-a14ae610a1be?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzR8fGludGVyaW9yfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Palm</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Decoration</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active">Active</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>24</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>46</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$60</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1600494603989-9650cf6ddd3d?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NTV8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Forest</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Living Room</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active">Active</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>41</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>16</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$270</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1560448204-603b3fc33ddc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Njd8fGludGVyaW9yfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Sand</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Living Room</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status disabled">Disabled</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>52</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>16</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$230</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1533779283484-8ad4940aa3a8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8ODd8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Autumn</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Decoration</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active">Active</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>21</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>46</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$252</div>
      </div>
      <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
          <div class="product-cell image">
            <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8aW50ZXJpb3J8ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
            <span>Boheme</span>
          </div>
        <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
        <div class="product-cell status-cell">
          <span class="cell-label">Status:</span>
          <span class="status active">Active</span>
        </div>
        <div class="product-cell sales"><span class="cell-label">Sales:</span>32</div>
        <div class="product-cell stock"><span class="cell-label">Stock:</span>40</div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$350</div>
      </div>
    </div>

  </div>
</div>
<!-- partial -->
  <script  src="assets2/script.js"></script>

</body>
</html>
