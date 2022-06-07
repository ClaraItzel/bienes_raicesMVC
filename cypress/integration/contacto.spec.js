describe('Probando Fornmulario de Contacto',()=>{
    it('Probando la página de contacto y el envío de emails',()=>{
        cy.visit('/contacto');
        cy.get('[data-cy="titulo_contacto"]').should('exist');
        cy.get('[data-cy="titulo_contacto"]').invoke('text').should('equal','Contacto');
        cy.get('[data-cy="titulo_contacto"]').invoke('text').should('not.equal','Formulario de Contacto');
        cy.get('[data-cy="heading-form"]').should('exist');
        cy.get('[data-cy="heading-form"]').invoke('text').should('equal','Llene el formulario de contacto');
        cy.get('[data-cy="heading-form"]').invoke('text').should('not.equal','Formulario de Contacto');
    });
    it('llenando los campos del formulario',()=>{
        cy.get('[data-cy="input-name"]').type('Clara Itzel');
        cy.get('[data-cy="txt-msj"]').type('Esto es un mensaje, de alguien que quiere comprar una casa');
        cy.get('[data-cy="input-opc"]').select('Compra');
        cy.get('[data-cy="input-precio"]').type('5000000');
        cy.get('[data-cy="input-radio"]').eq(1).check();
        cy.wait(2000);
        cy.get('[data-cy="input-radio"]').eq(0).check();
        cy.get('[data-cy="input-telefono"]').type('5512345678');
        cy.get('[data-cy="input-fecha"]').type('2022-03-15');
        cy.get('[data-cy="input-hora"]').type('12:30');
        cy.get('[data-cy="form-contacto"]').should('exist');

        cy.get('[data-cy="form-contacto"]').submit();
        cy.get('[data-cy="form-alerta"]').should('exist');
        cy.get('[data-cy="form-alerta"]').invoke('text').should('equal','mensaje enviando correctamente');
        cy.get('[data-cy="form-alerta"]').should('have.class','alerta').and('have.class','exito');
    })
})