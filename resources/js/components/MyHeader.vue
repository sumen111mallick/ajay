<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
     
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <router-link to="/home" class="navbar-item">Home</router-link>
      <router-link to="/invoice" class="navbar-item">Manage Invoice</router-link>
      <router-link to="/vendor" class="navbar-item">Manage Vendor</router-link>
      <router-link to="/billingaddress" class="navbar-item">Manage Billing Address</router-link>
      <router-link to="/shippingaddress" class="navbar-item">Manage Shipping Address</router-link>
      <router-link to="/vehicle" class="navbar-item">Manage Transportation</router-link>
      <router-link to="/item" class="navbar-item">Manage Item</router-link>
      <router-link to="/personal" class="navbar-item">Personal Detail</router-link>
       

      
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        
        <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Jobs
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Logout
          </a>
        </div>
      </div>
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
</template>