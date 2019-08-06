import Route from '@ember/routing/route';
import UnauthenticatedRouteMixin from 'ember-simple-auth/mixins/unauthenticated-route-mixin';
import OAuth2ImplicitGrantCallbackRouteMixin from 'ember-simple-auth/mixins/oauth2-implicit-grant-callback-route-mixin';

export default Route.extend(UnauthenticatedRouteMixin, OAuth2ImplicitGrantCallbackRouteMixin, {

    authenticator: 'authenticator:oauth2'

});