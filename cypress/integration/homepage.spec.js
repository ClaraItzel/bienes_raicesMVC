/// <refrences types="cypress" />
describe('Cargando la pagina principal',()=>{
    it('probando header',()=>{
        cy.visit('/');
        cy.get('[data-cy="heading-sitio"]').should("exist");
        
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal',' Venta de casa y departamentos de lujo ');
      
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal','de casa y departamentos de lujo ');
       

    });
    it('Probando el bloque de los iconos prinicipales',()=>{
        cy.get('[data-cy="heading-nosotros"]').should("exist");
        cy.get('[data-cy="heading-nosotros"]').invoke('text').should('equal','Más sobre nosostros');
        cy.get('[data-cy="heading-nosotros"]').invoke('text').should('not.equal','de casa y departamentos de lujo ');
        cy.get('[data-cy="heading-nosotros"]').should('have.prop','tagName').should('not.equal','H1');
        cy.get('[data-cy="iconos-nosotros"]').should('exist','tagName');
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length',3)
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length',8)

    });
    it('Probando el bloque de anuncios',()=>{
        cy.get('[data-cy="heading-anuncios"]').should("exist");
        cy.get('[data-cy="heading-anuncios"]').invoke('text').should('equal','Casas y depas en venta');
        cy.get('[data-cy="heading-anuncios"]').invoke('text').should('not.equal','de casa y departamentos de lujo ');
        cy.get('[data-cy="heading-anuncios"]').should('have.prop','tagName').should('not.equal','H1');
        cy.get('[data-cy="bloque-anuncios"]').should('exist','tagName');
        cy.get('[data-cy="bloque-anuncios"]').find('.anuncio').should('have.length',3)
        cy.get('[data-cy="bloque-anuncios"]').find('.anuncio').should('not.have.length',8)

        //PROBANDO ENLACES
        cy.get('[data-cy="enlace-anuncios"]').should('have.class','anuncio__btn');
        cy.get('[data-cy="enlace-anuncios"]').first().invoke('text').should('equal','Ver Propiedad');

        //PROBANDO ENLACES
        cy.get('[data-cy="enlace-anuncios"]').first().click();
        cy.get('[data-cy="titulo-anuncio"]').should("exist");
       // cy.wait(1500);
        cy.go('back');

    });
    it('Probando el routing hacía todas las propiedades',()=>{
        cy.get('[data-cy="ver_todas"]').should("exist");
        cy.get('[data-cy="ver_todas"]').should("have.class",'anuncio__btn--verde');
        cy.get('[data-cy="ver_todas"]').invoke('attr','href').should('equal','anuncios');
        cy.get('[data-cy="ver_todas"]').click();
        cy.get('[data-cy="titulo-listado"]').should("exist");
        cy.get('[data-cy="titulo-listado"]').invoke('text').should("equal","Casas y Depas en Venta");
       // cy.wait(1500);
        cy.go('back');
    });
    it('Probando contacto',()=>{
        cy.get('[data-cy="img-contacto"]').should("exist");
        cy.get('[data-cy="img-contacto"]').find('h2').invoke('text').should('equal','Encuentra la clase de tus sueños');
        cy.get('[data-cy="img-contacto"]').find('p').invoke('text').should('equal','Llena el formulario de contacto y un asesor se pondrá en contanto contigo a la brevedad');
        cy.get('[data-cy="img-contacto"]').find('a').invoke('attr','href')
            .then( href=>{
                cy.visit(href);
            } )
         cy.get('[data-cy="titulo_contacto"]').should("exist");
        // cy.wait(1500);
         cy.visit('/');
    })
    it('prueba testimoniales y blog',()=>{
        cy.get('[data-cy="blog"]').should("exist");
        cy.get('[data-cy="blog"]').find('h4').invoke('text').should('equal','Terraza en el techo de tu casa');
        cy.get('[data-cy="blog"]').find('img').should('have.length',1);
        cy.get('[data-cy="testimonial"]').should("exist");
        cy.get('[data-cy="testimonial"]').find('h3').invoke('text').should('equal','Testimoniales');
        cy.get('[data-cy="testimonial"]').find('h3').invoke('text').should('not.equal','Nuestros Testimoniales');
    })
})