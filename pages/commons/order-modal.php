<div id="orderModal" class="modal" tabindex="-1">
    <div class="modal-dialog modal-xl"><!--  style="max-width: 80%;" -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-3">
                        <div id="orderNameFormGroup" class="form-group">
                            <label for="largeInput">Order name</label>
                            <input type="text" class="form-control form-control" id="orderName" name="orderName" placeholder="Order name" value="" />
                            <small id="orderNameHelp" class="form-text text-muted d-none">This field is required.</small>
                        </div>
                    </div>
                    <div class="col-md-5"></div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderType" value="1" class="selectgroup-input" />
                                    <span class="selectgroup-button">Free Form<br />Progressive</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderType" value="2" class="selectgroup-input" />
                                    <span class="selectgroup-button">Bifocal<br />Trifocal</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderType" value="3" class="selectgroup-input" />
                                    <span class="selectgroup-button">Single<br />Vision</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-md-1 my-auto pt-4 text-center">
                        <h3>R</h3>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <label for="largeInput">SPH</label>
                            <input type="text" class="form-control form-control" id="orderRSPH" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <label for="largeInput">CYL</label>
                            <input type="text" class="form-control form-control" id="orderRCYL" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <label for="largeInput">AXIS</label>
                            <input type="text" class="form-control form-control" id="orderRAXIS" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <label for="largeInput">ADD</label>
                            <input type="text" class="form-control form-control" id="orderRADD" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <label for="largeInput">DIA</label>
                            <input type="text" class="form-control form-control" id="orderRDIA" value="" />
                        </div>
                    </div>
                    <div class="col-md-3 ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <label for="largeInput">PRISM</label>
                            <input type="text" class="form-control form-control" id="orderRPRISM" value="" />
                        </div>
                    </div>
                    <div class="col-md-1 ps-1 pe-1" style="margin-right: -3.0rem !important;"></div>
                    <div class="col-md-1 ps-1 pe-1" style="margin-right: 1.1rem !important;">
                        <div class="form-group text-center p-0">
                            <label for="largeInput">QTY</label>
                            <input type="text" class="form-control form-control" id="orderRQTY" value="" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-1 my-auto text-center">
                        <h3>L</h3>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <input type="text" class="form-control form-control" id="orderLSPH" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <input type="text" class="form-control form-control" id="orderLCYL" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <input type="text" class="form-control form-control" id="orderLAXIS" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <input type="text" class="form-control form-control" id="orderLADD" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <input type="text" class="form-control form-control" id="orderLDIA" value="" />
                        </div>
                    </div>
                    <div class="col-md-3 ps-1 pe-1">
                        <div class="form-group text-center p-0">
                            <input type="text" class="form-control form-control" id="orderLPRISM" value="" />
                        </div>
                    </div>
                    <div class="col-md-1 ps-1 pe-1" style="margin-right: -3.0rem !important;"></div>
                    <div class="col-md-1 ps-1 pe-1" style="margin-right: 1.1rem !important;">
                        <div class="form-group text-center p-0">
                            <input type="text" class="form-control form-control" id="orderLQTY" value="" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">HBOX</label>
                            <input type="text" class="form-control form-control" id="orderHBOX" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">VBOX</label>
                            <input type="text" class="form-control form-control" id="orderVBOX" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">EDBOX</label>
                            <input type="text" class="form-control form-control" id="orderEDBOX" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">DBL</label>
                            <input type="text" class="form-control form-control" id="orderDBL" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">SEG.H(R)</label>
                            <input type="text" class="form-control form-control" id="orderRSEG" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">PD(R)</label>
                            <input type="text" class="form-control form-control" id="orderRPD" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">PD(L)</label>
                            <input type="text" class="form-control form-control" id="orderLPD" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">PANTO</label>
                            <input type="text" class="form-control form-control" id="orderPANTO" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">ZTILT</label>
                            <input type="text" class="form-control form-control" id="orderZTILT" value="" />
                        </div>
                    </div>
                    <div class="col ps-1 pe-1" style="margin-right: 1.1rem !important;">
                        <div class="form-group text-center ps-0 pe-0">
                            <label for="largeInput">INSET</label>
                            <input type="text" class="form-control form-control" id="orderINSET" value="" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Design</label>
                            <select class="form-select" id="orderDesign" name="orderDesign" value=""></select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Index</label>
                            <select class="form-select" id="orderIndex" name="orderIndex" value=""></select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Color</label>
                            <select class="form-select" id="orderColor" name="orderColor" value=""></select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Corridor</label>
                            <select class="form-select" id="orderCorridor" name="orderCorridor" disabled value="">
                                <option value="8mm">8mm</option>
                                <option value="9mm">9mm</option>
                                <option value="10mm">10mm</option>
                                <option value="11mm">11mm</option>
                                <option value="12mm">12mm</option>
                                <option value="13mm">13mm</option>
                                <option value="14mm">14mm</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">FRAME</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderFrame" value="Full" class="selectgroup-input" />
                                    <span class="selectgroup-button">Full</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderFrame" value="Rimless" class="selectgroup-input" />
                                    <span class="selectgroup-button">Rimless</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderFrame" value="Semi-Rimless" class="selectgroup-input" />
                                    <span class="selectgroup-button">Semi-Rimless</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Coating</label>
                            <select class="form-select" id="orderCoating" name="orderCoating">
                                <option value="NC">NC</option>
                                <option value="HC">HC</option>
                                <option value="AR HMC">AR HMC</option>
                                <option value="USH">USH</option>
                                <option value="SD Diamond">SD Diamond</option>
                                <option value="Premium HC">Premium HC</option>
                                <option value="Premium HMC">Premium HMC</option>
                                <option value="Premium USH">Premium USH</option>
                                <option value="BlueBlock">BlueBlock</option>
                                <option value="Blue/Green">Blue/Green</option>
                                <option value="Anti-Fog HMC">Anti-Fog HMC</option>
                                <option value="Inside HMC">Inside HMC</option>
                                <option value="Inside USH">Inside USH</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="form-label">UV</label>
                            <div class="selectgroup">
                              <label class="selectgroup-item">
                                <input type="checkbox" name="orderUV" class="selectgroup-input" unchecked />
                                <span class="selectgroup-button">Add</span>
                              </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">TINT COLOR</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderTintColor" value="One tone" class="selectgroup-input" />
                                    <span class="selectgroup-button">One tone</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderTintColor" value="Two tone" class="selectgroup-input" />
                                    <span class="selectgroup-button">Two tone</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="text" class="form-control form-control" id="orderTintColorDesc" value="" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">MIRROR</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderMirror" value="Full" class="selectgroup-input" />
                                    <span class="selectgroup-button">Full</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="orderMirror" value="Half" class="selectgroup-input" />
                                    <span class="selectgroup-button">Half</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="text" class="form-control form-control" id="orderMirrorDesc" value="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="comment">Order Memo</label>
                            <textarea class="form-control" id="orderMemo" rows="4" value=""></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-1 text-end my-auto">
                        <h3>Quantity: </h3>
                    </div>
                    <div class="col-md-1">
                        <div class="form-floating form-floating-custom mb-3">
                            <input type="text" class="form-control text-center" style="font-size: 20px; padding-right: 0px;" id="orderQty" placeholder="1" />
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if ($_SESSION["auth"] === "0") {
                    echo '
                        <div class="modal-footer d-flex justify-content-between">
                            <div class="col-md-3 d-flex align-items-center">
                                <h5 class="form-label mb-0 me-2">State: </h5>
                                <select class="form-select" id="orderState">
                                    <option value="ordered">Ordered</option>
                                    <option value="processing">Processing</option>
                                    <option value="completed">Completed</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>
                            <div>
                                <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button id="saveButton" type="button" class="btn btn-lg btn-primary">Save</button>
                            </div>
                        </div>
                    ';
                } else {
                    echo '
                        <div class="modal-footer d-flex justify-content-between">
                            <div class="col-md-3 d-flex align-items-center invisible">
                                <h5 class="form-label mb-0 me-2">State: </h5>
                                <select class="form-select" id="orderState">
                                    <option value="ordered">Ordered</option>
                                    <option value="processing">Processing</option>
                                    <option value="completed">Completed</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>
                            <div>
                                <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button id="saveButton" type="button" class="btn btn-lg btn-primary">Save</button>
                            </div>
                        </div>
                    ';
                }
            ?>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="saveButton" type="button" class="btn btn-lg btn-primary">Save</button>
            </div> -->
        </div>
    </div>
</div>