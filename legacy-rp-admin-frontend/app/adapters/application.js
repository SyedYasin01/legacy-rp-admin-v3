import DS from 'ember-data';
import { isPresent } from '@ember/utils';
import DataAdapterMixin from "ember-simple-auth/mixins/data-adapter-mixin";

export default DS.JSONAPIAdapter.extend(DataAdapterMixin, {
    // Define the namespace used for API requests.
    namespace: 'api/v1',

    authorize(xhr) {
        let { access_token } = this.session.data.authenticated;
        if (isPresent(access_token)) {
            xhr.setRequestHeader('Authorization', `Bearer ${access_token}`);
        }
    }

});
