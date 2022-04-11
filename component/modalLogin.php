  <!-- ======= Modals ======= -->
  <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="Label"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="wrap">
                      <div class="img" style="background-image:url(images/xbg-1.jpg.pagespeed.ic.EtoN2PmO7Y.webp)"></div>
                      <div class="login-wrap p-4 p-md-5">
                          <div class="d-flex">
                              <div class="w-100">
                                  <h3 class="mb-4">Sign In</h3>
                              </div>
                            
                          </div>
                          <form id="loginForm" class="signin-form">
                              <div class="form-group mt-3 mb-2">
                                  <label class="form-control-placeholder" for="username">Username</label>
                                  <input type="text" class="form-control" name="username" required="">
                              </div>
                              <div class="form-group">
                                  <label class="form-control-placeholder" for="password">Password</label>
                                  <input id="password-field" type="password"  name="password" class="form-control" required="">
                              </div>
                              <div class="form-group">
                                  <button type="button" onclick="loginForm()" class="form-control btn btn-primary rounded submit px-3 mt-3">Sign In</button>
                              </div>
                              <div class="form-group d-md-flex">
                                  <div class="w-50 text-left d-none">
                                      <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                          <input type="checkbox" checked="">
                                          <span class="checkmark"></span>
                                      </label>
                                  </div>
                                  <div class="w-50 text-md-right d-none">
                                      <a href="#">Forgot Password</a>
                                  </div>
                              </div>
                          </form>
                          <hr style="margin-top:3%">
                          <p class="text-center mt-3">Not a member? <br> <button class="btn btn-outline-dark" data-bs-target="#Registro" data-bs-toggle="modal">Sign Up</button></p>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
  <!-- ======= Header ======= -->