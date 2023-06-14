rndefine("#RNMainWebsiteField",["#RNMainCore/EventManager","#RNMainFormBuilderCore/FieldWithPrice.Model","lit","#RNMainCore/Sanitizer","lit/decorators","#RNMainFormBuilderCore/FieldBase","#RNMainFormBuilderCore/FieldWithPrice","lit-html/directives/live.js","#RNMainCore/StoreBase","#RNMainFormBuilderCore/FieldWithPrice.Options","#RNMainFormBuilderCore/FormBuilder.Options"],(function(e,t,i,s,r,l,a,n,d,o,h){"use strict";class u extends t.FieldWithPriceModel{InternalSerialize(e){super.InternalSerialize(e),e.Value=this.GetValue()}GetStoresInformation(){return!0}GetIsUsed(){return!!super.GetIsUsed()&&""!=this.Text.trim()}get IsReadonly(){return!!this.Options.ReadOnly||super.IsReadonly}GetText(){return this.Text}GetValue(){return this.GetIsVisible()?this.Text:""}InitializeStartingValues(){this.Text=this.GetPreviousDataProperty("Value",this.Options.DefaultText)}GetDynamicFieldNames(){return["FBWebsiteField"]}SetText(e){this.Text=s.Sanitizer.SanitizeString(e),""!=this.Text.trim()&&this.RemoveError("required"),this.FireValueChanged()}async Validate(){return!!await super.Validate()&&(""==this.Text.trim()||this.ValidateWebsite())}ValidateWebsite(){return""==this.Text||this.WebsiteIsValid()?(this.RemoveError("invalid_website"),!0):(this.AddError("invalid_website",RNTranslate("Invalid URL")),!1)}WebsiteIsValid(){return!!this.TestWebsite(this.Text)||!!this.TestWebsite("https://"+this.Text)&&(this.SetText("https://"+this.Text),!0)}TestWebsite(e){return!!new RegExp("^https?:\\/\\/((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|((\\d{1,3}\\.){3}\\d{1,3}))(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*(\\?[;&a-z\\d%_.~+=-]*)?(\\#[-a-z\\d_]*)?$","i").test(e)}render(){return i.html`<rn-website-field .model="${this}"></rn-website-field>`}}var p;let c=r.customElement("rn-website-field")(p=class extends a.FieldWithPrice{static get properties(){return l.FieldBase.properties}SubRender(){return i.html` <div class={'rnTextFieldInput '+ additionalClassNames+(this.Model.IsFocused?' RNFocus':'')}> <input ?readonly=${this.model.IsReadonly} @focus=${()=>{this.model.IsFocused=!0,this.model.Refresh()}} @blur=${()=>{this.model.IsFocused=!1,this.model.ValidateWebsite(),this.model.Refresh()}} class='rnInputPrice' placeholder=${this.model.Options.Placeholder} style="width:100%" type='url' .value=${n.live(this.model.Text)} @input=${e=>this.OnChange(e)}/> </div> `}OnChange(e){this.model.SetText(e.target.value)}})||p;var b,m,F;let x=(b=d.StoreDataType(Object),m=class extends o.FieldWithPriceOptions{constructor(...e){super(...e),babelHelpers.initializerDefineProperty(this,"Icon",F,this)}LoadDefaultValues(){super.LoadDefaultValues(),this.ReadOnly=!1,this.Type="website",this.Label="Website",this.Icon=(new h.IconOptions).Merge(),this.Placeholder="",this.DefaultText=""}},F=babelHelpers.applyDecoratedDescriptor(m.prototype,"Icon",[b],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),m);exports.WebsiteFieldModel=u,exports.WebsiteField=c,exports.WebsiteFieldOptions=x,e.EventManager.Subscribe("GetFieldOptions",(e=>{if("website"==e)return new x})),e.EventManager.Subscribe("GetFieldModel",(e=>{if("website"==e.Options.Type)return new u(e.Options,e.Parent)}))}));
