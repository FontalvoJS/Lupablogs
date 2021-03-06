  <!-- ======= Modals ======= -->
  <div class="modal fade" id="Registro" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
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
                                  <h3 class="mb-4">Sign up</h3>
                              </div>
                            
                          </div>
                          <form id="registroForm" class="signin-form">
                              <div class="form-group mt-3 mb-2">
                                  <label class="form-control-placeholder" for="username">Username</label>
                                  <input type="text" name="username" class="form-control" required>
                              </div>
                              <div class="form-group mt-3 mb-2">
                                  <label class="form-control-placeholder" id="emailReg" for="email">Email</label>
                                  <input type="email" name="email" class="form-control" required>
                              </div>
                              <div class="form-group mt-3">
                                  <label class="form-control-placeholder" for="password">Password</label>
                                  <input type="password" name="password" class="form-control" required>
                              </div>

                              <div class="form-group mt-3">
                                  <button type="button" onclick="registroForm()" class="form-control btn btn-primary rounded submit px-3">Continue</button>
                              </div>

                          </form>
                          <p class="text-center mt-3">Eres miembro? <br><button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#Login">Access</button></p>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
  <!-- ======= Header ======= -->